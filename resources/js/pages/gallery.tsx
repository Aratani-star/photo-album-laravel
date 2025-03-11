import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';
import { useState } from 'react';
import AppLayout from '@/layouts/app-layout';

import Heading from '@/components/heading';
import ImageItem from '@/components/image-item';
import ImageModal from '@/components/image-modal';
import ImageUploadButton from '@/components/image-upload-btn';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Gallery',
        href: '/Gallery',
    },
];

// export default function Profile({ mustVerifyEmail, status }: { mustVerifyEmail: boolean; status?: string }) {
interface Image {
    id: number;
    url: string;
    name: string;
    description: string;
}

export default function Gallery({ images }: { images: Image[] }) {
    const [selectedImage, setSelectedImage] = useState<Image | null>(null);
    const handleImageClick = (img: Image) => {
        setSelectedImage(img);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Gallery" />

            <div className="px-4 py-6">
                <Heading title="Wild gallery" description="Shows wild animals album." />
                <ImageUploadButton />
                <div className="mt-4 grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
                    {images.map((img) => (
                        <div key={img.id} onClick={() => handleImageClick(img)} className="cursor-pointer">
                            <ImageItem url={img.url} name={img.name} description={img.description} />
                        </div>
                    ))}
                </div>
            </div>
            {selectedImage && <ImageModal image={selectedImage} onClose={() => setSelectedImage(null)} />}
        </AppLayout>
    );
}
