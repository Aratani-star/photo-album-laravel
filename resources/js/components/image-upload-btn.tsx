import React, { useState } from "react";
import axios from "axios";

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
        formData.append("image", image);
        try {
            const response = await axios.post(
                "http://localhost:8000/gallery/upload", // Replace with your API URL
                formData,
                {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                }
            );
        } catch (error) {
            console.error("Error uploading image", error);
        }
    };

    return (
        <div>
            <form onSubmit={handleSubmit} className="flex items-center gap-4">
                <input type="file" id="upload" className="hidden" onChange={handleImageChange} />
                <label htmlFor="upload" className="cursor-pointer bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition" >Select Image</label>
                {imagePreview && ( <img src={imagePreview} alt="Preview" className="w-16 h-16 object-cover rounded-md" /> )}
                {imagePreview && ( <button type="submit" className="cursor-pointer bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">Upload Image</button> )}
            </form>
        </div>

    );
};

export default ImageUpload;