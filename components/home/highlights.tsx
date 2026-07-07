import Link from "next/link"
import { ArrowRight, CheckCircle2 } from "lucide-react"
import { universityStats } from "@/lib/data"

export function Stats() {
  return (
    <section className="border-y border-border bg-primary text-primary-foreground">
      <div className="mx-auto grid max-w-7xl grid-cols-2 gap-8 px-4 py-14 md:grid-cols-4 md:px-6">
        {universityStats.map((stat) => (
          <div key={stat.label} className="text-center">
            <div className="font-serif text-4xl font-bold md:text-5xl">{stat.value}</div>
            <div className="mt-2 text-sm text-primary-foreground/75">{stat.label}</div>
          </div>
        ))}
      </div>
    </section>
  )
}

export function CampusLife() {
  const points = [
    "A tech-forward university dedicated to science, engineering, and applied research.",
    "Vibrant student community with clubs spanning technology, arts, and wellness.",
    "Modern libraries, innovation centers, and well-equipped dormitories.",
  ]

  return (
    <section className="mx-auto max-w-7xl px-4 py-16 md:px-6 md:py-24">
      <div className="grid items-center gap-10 lg:grid-cols-2">
        <div className="overflow-hidden rounded-3xl border border-border">
          <img
            src="/images/students-collaborating.png"
            alt="AASTU students collaborating in a modern innovation lab"
            className="h-full w-full object-cover"
          />
        </div>
        <div>
          <p className="text-sm font-semibold uppercase tracking-widest text-primary">Campus life</p>
          <h2 className="mt-3 text-balance font-serif text-3xl font-bold tracking-tight text-foreground md:text-4xl">
            Where future engineers and scientists come together
          </h2>
          <p className="mt-4 text-pretty leading-relaxed text-muted-foreground">
            AASTU is more than lecture halls. It is a living community where students build projects,
            lead clubs, support one another, and shape Ethiopia&apos;s technological future.
          </p>
          <ul className="mt-6 space-y-3">
            {points.map((point) => (
              <li key={point} className="flex items-start gap-3">
                <CheckCircle2 className="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                <span className="text-sm leading-relaxed text-foreground">{point}</span>
              </li>
            ))}
          </ul>
          <Link
            href="/about"
            className="mt-8 inline-flex items-center gap-2 rounded-lg bg-primary px-5 py-3 text-sm font-semibold text-primary-foreground transition-transform hover:-translate-y-0.5"
          >
            Meet our leadership
            <ArrowRight className="h-4 w-4" />
          </Link>
        </div>
      </div>
    </section>
  )
}
