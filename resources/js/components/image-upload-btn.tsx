import axios from 'axios';
import { useState } from 'react';

const ImageUpload = () => {
    const [image, setImage] = useState(null);
    const [imagePreview, setImagePreview] = useState(null);

    const handleImageChange = (e) => {
        const file = e.target.files[0];
        setImage(file);

        // Preview the image
        const reader = new FileReader();
        reader.onloadend = () => {
            setImagePreview(reader.result);
        };
        if (file) {
            reader.readAsDataURL(file);
        }
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        const formData = new FormData();
        formData.append('image', image);
        try {
            const response = await axios.post(
                'http://localhost:8000/gallery/upload', // Replace with your API URL
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                },
            );
        } catch (error) {
            console.error('Error uploading image', error);
        }
    };
    
    return (
        <div>
            <form onSubmit={handleSubmit} className="flex items-center gap-4">
                <input type="file" id="upload" className="hidden" onChange={handleImageChange} />
                <label htmlFor="upload" className="cursor-pointer rounded-lg bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-600">
                    Select Image
                </label>
                {imagePreview && <img src={imagePreview} alt="Preview" className="h-16 w-16 rounded-md object-cover" />}
                {imagePreview && (
                    <button type="submit" className="cursor-pointer rounded-lg bg-green-500 px-4 py-2 text-white transition hover:bg-green-600">
                        Upload Image
                    </button>
                )}
            </form>
        </div>
    );
};

export default ImageUpload;
