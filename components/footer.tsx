import Link from "next/link"
import { GraduationCap, MapPin, Mail, Phone } from "lucide-react"

const footerLinks = [
  {
    title: "Explore",
    links: [
      { href: "/about", label: "About Us" },
      { href: "/academics", label: "Academics" },
      { href: "/admission", label: "Admission" },
    ],
  },
  {
    title: "Campus Life",
    links: [
      { href: "/student-union", label: "Student Union" },
      { href: "/clubs", label: "Clubs" },
      { href: "/blocks", label: "Blocks & Colleges" },
      { href: "/religious", label: "Religious Associations" },
    ],
  },
]

export function Footer() {
  return (
    <footer className="mt-20 border-t border-border bg-secondary/40">
      <div className="mx-auto grid max-w-7xl gap-10 px-4 py-14 md:grid-cols-2 md:px-6 lg:grid-cols-4">
        <div className="lg:col-span-2">
          <Link href="/" className="flex items-center gap-2">
            <span className="flex h-9 w-9 items-center justify-center rounded-lg bg-primary text-primary-foreground">
              <GraduationCap className="h-5 w-5" />
            </span>
            <span className="font-serif text-lg font-bold text-foreground">
              AASTU<span className="ml-1 text-primary">Campus</span>
            </span>
          </Link>
          <p className="mt-4 max-w-sm text-sm leading-relaxed text-muted-foreground">
            The smart campus portal for Addis Ababa Science and Technology University — connecting
            students, faculty, and the community with everything happening on campus.
          </p>
          <ul className="mt-6 space-y-2 text-sm text-muted-foreground">
            <li className="flex items-center gap-2">
              <MapPin className="h-4 w-4 text-primary" /> Kilinto, Akaki Kality, Addis Ababa, Ethiopia
            </li>
            <li className="flex items-center gap-2">
              <Mail className="h-4 w-4 text-primary" /> info@aastu.edu.et
            </li>
            <li className="flex items-center gap-2">
              <Phone className="h-4 w-4 text-primary" /> +251 11 888 0800
            </li>
          </ul>
        </div>

        {footerLinks.map((group) => (
          <div key={group.title}>
            <h3 className="font-serif text-sm font-semibold text-foreground">{group.title}</h3>
            <ul className="mt-4 space-y-2">
              {group.links.map((link) => (
                <li key={link.href}>
                  <Link
                    href={link.href}
                    className="text-sm text-muted-foreground transition-colors hover:text-primary"
                  >
                    {link.label}
                  </Link>
                </li>
              ))}
            </ul>
          </div>
        ))}
      </div>

      <div className="border-t border-border">
        <div className="mx-auto flex max-w-7xl flex-col items-center justify-between gap-2 px-4 py-6 text-sm text-muted-foreground md:flex-row md:px-6">
          <p>&copy; {new Date().getFullYear()} Addis Ababa Science &amp; Technology University. All rights reserved.</p>
          <p>Built by Group 3 · AASTU Smart Campus</p>
        </div>
      </div>
    </footer>
  )
}
