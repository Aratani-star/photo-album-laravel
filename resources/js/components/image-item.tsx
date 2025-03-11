export default function ImageItem({ url, name, description }: { url: string; name: string; description: string }) {
    return (
        <div className="rounded border p-2 shadow">
            <img src={'http://localhost:8000/storage/' + url} alt={name} className="h-40 w-full rounded object-cover" />
            <h2 className="xs:text-xs font-semibold sm:text-sm lg:text-lg xl:text-xl">{name}</h2>
        </div>
    );
}
