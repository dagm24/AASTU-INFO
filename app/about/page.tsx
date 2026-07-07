import type { Metadata } from "next"
import { Mail, Target, Eye, Award } from "lucide-react"
import { PageHero } from "@/components/page-hero"
import { Avatar } from "@/components/avatar"
import { leadershipTeam } from "@/lib/data"

export const metadata: Metadata = {
  title: "About Us — AASTU Smart Campus",
  description:
    "Learn about Addis Ababa Science and Technology University, its mission and vision, and meet the leadership team guiding the institution.",
}

const values = [
  {
    icon: Target,
    title: "Our Mission",
    text: "To produce competent professionals in science and technology through quality education, research, and community service that advances Ethiopia&apos;s development.",
  },
  {
    icon: Eye,
    title: "Our Vision",
    text: "To be a premier African university of science and technology, recognized for excellence in teaching, research, and innovation by 2030.",
  },
  {
    icon: Award,
    title: "Our Values",
    text: "Excellence, integrity, innovation, inclusiveness, and a deep commitment to serving society through applied science and engineering.",
  },
]

export default function AboutPage() {
  return (
    <>
      <PageHero
        eyebrow="About Us"
        title="Advancing science and technology for Ethiopia"
        description="Addis Ababa Science and Technology University (AASTU) is one of Ethiopia's leading institutions dedicated to science, engineering, and applied research, shaping the innovators of tomorrow."
      />

      <section className="mx-auto max-w-7xl px-4 py-16 md:px-6">
        <div className="grid gap-5 md:grid-cols-3">
          {values.map((value) => {
            const Icon = value.icon
            return (
              <div key={value.title} className="rounded-2xl border border-border bg-card p-6">
                <span className="flex h-11 w-11 items-center justify-center rounded-xl bg-secondary text-primary">
                  <Icon className="h-5 w-5" />
                </span>
                <h2 className="mt-4 font-serif text-xl font-semibold text-card-foreground">{value.title}</h2>
                <p
                  className="mt-2 text-sm leading-relaxed text-muted-foreground"
                  dangerouslySetInnerHTML={{ __html: value.text }}
                />
              </div>
            )
          })}
        </div>
      </section>

      <section className="mx-auto max-w-7xl px-4 pb-20 md:px-6">
        <div className="max-w-2xl">
          <p className="text-sm font-semibold uppercase tracking-widest text-primary">Leadership</p>
          <h2 className="mt-3 text-balance font-serif text-3xl font-bold tracking-tight text-foreground md:text-4xl">
            Meet the leadership team
          </h2>
          <p className="mt-3 leading-relaxed text-muted-foreground">
            The dedicated academics and administrators who guide AASTU across its colleges and divisions.
          </p>
        </div>

        <div className="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
          {leadershipTeam.map((leader) => (
            <div
              key={leader.email}
              className="flex items-start gap-4 rounded-2xl border border-border bg-card p-5 transition-colors hover:border-primary/40"
            >
              <Avatar name={leader.name} />
              <div className="min-w-0">
                <h3 className="font-serif text-base font-semibold text-card-foreground">{leader.name}</h3>
                <p className="text-sm text-primary">{leader.role}</p>
                <a
                  href={`mailto:${leader.email}`}
                  className="mt-1.5 flex items-center gap-1.5 truncate text-xs text-muted-foreground transition-colors hover:text-primary"
                >
                  <Mail className="h-3.5 w-3.5 shrink-0" />
                  <span className="truncate">{leader.email}</span>
                </a>
              </div>
            </div>
          ))}
        </div>
      </section>
    </>
  )
}
