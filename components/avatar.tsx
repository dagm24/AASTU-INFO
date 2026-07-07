function initials(name: string) {
  return name
    .replace(/\(.*?\)/g, "")
    .replace(/(PhD|Dr\.)/gi, "")
    .trim()
    .split(/\s+/)
    .slice(0, 2)
    .map((n) => n[0])
    .join("")
    .toUpperCase()
}

const palette = [
  "bg-primary/12 text-primary",
  "bg-accent/25 text-accent-foreground",
  "bg-secondary text-secondary-foreground",
]

export function Avatar({ name, size = 56 }: { name: string; size?: number }) {
  const color = palette[name.length % palette.length]
  return (
    <span
      className={`flex shrink-0 items-center justify-center rounded-full font-serif font-semibold ${color}`}
      style={{ width: size, height: size, fontSize: size / 2.6 }}
      aria-hidden="true"
    >
      {initials(name)}
    </span>
  )
}
