import Link from "next/link"
import { BookOpen, Users, Building2, HeartHandshake, Compass, GraduationCap } from "lucide-react"

const links = [
  { href: "/academics", label: "Academics", desc: "13+ undergraduate programs across four colleges.", icon: BookOpen },
  { href: "/admission", label: "Admission", desc: "Requirements and steps to join AASTU.", icon: GraduationCap },
  { href: "/student-union", label: "Student Union", desc: "Your elected representatives and offices.", icon: Users },
  { href: "/clubs", label: "Clubs", desc: "Find your community among 20+ active clubs.", icon: Compass },
  { href: "/blocks", label: "Blocks & Colleges", desc: "Navigate every college, library, and dorm.", icon: Building2 },
  { href: "/religious", label: "Religious Life", desc: "Faith communities and associations on campus.", icon: HeartHandshake },
]

export function QuickLinks() {
  return (
    <section className="mx-auto max-w-7xl px-4 py-16 md:px-6 md:py-24">
      <div className="max-w-2xl">
        <p className="text-sm font-semibold uppercase tracking-widest text-primary">Navigate campus</p>
        <h2 className="mt-3 text-balance font-serif text-3xl font-bold tracking-tight text-foreground md:text-4xl">
          Everything a student needs, one click away
        </h2>
      </div>

      <div className="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        {links.map((link) => {
          const Icon = link.icon
          return (
            <Link
              key={link.href}
              href={link.href}
              className="group rounded-2xl border border-border bg-card p-6 transition-all hover:-translate-y-1 hover:border-primary/40 hover:shadow-lg"
            >
              <span className="flex h-11 w-11 items-center justify-center rounded-xl bg-secondary text-primary transition-colors group-hover:bg-primary group-hover:text-primary-foreground">
                <Icon className="h-5 w-5" />
              </span>
              <h3 className="mt-4 font-serif text-lg font-semibold text-card-foreground">{link.label}</h3>
              <p className="mt-1.5 text-sm leading-relaxed text-muted-foreground">{link.desc}</p>
            </Link>
          )
        })}
      </div>
    </section>
  )
}
