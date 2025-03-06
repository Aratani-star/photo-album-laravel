import { type BreadcrumbItem, type SharedData } from '@/types';
import { Head } from '@inertiajs/react';

import AppLayout from '@/layouts/app-layout';
import Heading from '@/components/heading';
import ImageItem from '@/components/image-item'
import { useState } from 'react';
import ImageModal from '@/components/image-modal'
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Gallery',
        href: '/Gallery',
    },
];

// export default function Profile({ mustVerifyEmail, status }: { mustVerifyEmail: boolean; status?: string }) {
export default function Gallery( {images}: {images: string;}) {
    
    const [selectedImage, setSelectedImage] = useState<object | null>(null)
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Gallery" />
            <div className="px-4 py-6">
                <Heading title="WILD GALLERY" description="Shows wild animals album." />
                <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
                    {
                        images.map((img) => (
                            <div key={img.id} onClick={() => setSelectedImage(img)}  className="cursor-pointer">
                                <ImageItem url={img.url} name={img.name} description={img.description}/>
                            </div>
                        ))
                    }
                </div>
            </div>
            {selectedImage && <ImageModal image={selectedImage} onClose={() => setSelectedImage(null)} />}
        </AppLayout>
    );
}
