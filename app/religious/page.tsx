import type { Metadata } from "next"
import { HeartHandshake, Clock, Send } from "lucide-react"
import { PageHero } from "@/components/page-hero"
import { religiousAssociations } from "@/lib/data"

export const metadata: Metadata = {
  title: "Religious Associations — AASTU Smart Campus",
  description:
    "Explore the faith communities and religious associations at AASTU, offering worship, fellowship, and community service for students.",
}

export default function ReligiousPage() {
  return (
    <>
      <PageHero
        eyebrow="Religious Associations"
        title="Faith and fellowship on campus"
        description="AASTU welcomes students of all faiths. Our religious associations provide spaces for worship, fellowship, and community service throughout the academic year."
      />

      <section className="mx-auto max-w-7xl px-4 py-16 md:px-6">
        <div className="grid gap-4 md:grid-cols-2">
          {religiousAssociations.map((assoc) => (
            <div
              key={assoc.name}
              className="flex flex-col rounded-2xl border border-border bg-card p-7 transition-colors hover:border-primary/40"
            >
              <span className="flex h-11 w-11 items-center justify-center rounded-xl bg-secondary text-primary">
                <HeartHandshake className="h-5 w-5" />
              </span>
              <h3 className="mt-4 font-serif text-xl font-semibold leading-snug text-card-foreground">
                {assoc.name}
              </h3>
              <p className="mt-2 flex-1 text-sm leading-relaxed text-muted-foreground">{assoc.description}</p>
              <div className="mt-5 flex flex-wrap items-center justify-between gap-3 border-t border-border pt-4">
                <span className="flex items-center gap-1.5 text-xs text-muted-foreground">
                  <Clock className="h-3.5 w-3.5 text-primary" /> {assoc.meeting}
                </span>
                <a
                  href={assoc.contact}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="flex items-center gap-1.5 rounded-lg bg-secondary px-3 py-1.5 text-xs font-semibold text-primary transition-colors hover:bg-primary hover:text-primary-foreground"
                >
                  <Send className="h-3.5 w-3.5" /> Connect
                </a>
              </div>
            </div>
          ))}
        </div>
      </section>
    </>
  )
}
