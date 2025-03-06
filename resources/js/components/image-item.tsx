
export default function ImageItem({ url, name, description }: { url: string; name: string; description: string;}) {

  return (
    <div className="border p-2 rounded shadow">
      <img src={url} alt={name} className="w-full h-40 object-cover rounded" />
      <h2 className="lg:text-lg sm:text-sm xs:text-xs xl:text-xl font-semibold">{name}</h2>
    </div>
  )
}
