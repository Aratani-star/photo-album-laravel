interface ImageModalProps {
    image: object | null;
    onClose: () => void;
}

export default function ImageModal({ image, onClose }: ImageModalProps) {
    if (!image) return null;

    return (
        <div className="bg-opacity-50 fixed inset-0 z-50 flex items-center justify-center bg-black" onClick={onClose}>
            <div className="w-full max-w-md rounded-lg border-2 border-white bg-black p-4 shadow-lg" onClick={(e) => e.stopPropagation()}>
                <button className="absolute top-2 right-2 text-gray-600" onClick={onClose}>
                    ✖
                </button>
                <img src={'http://localhost:8000/storage/' + image.url} alt={image.name} className="h-60 w-full rounded object-cover" />
                <h2 className="mt-2 text-xl font-bold">{image.name}</h2>
                {image.description && <p className="mt-1 text-gray-600">{image.description}</p>}
            </div>
        </div>
    );
}
