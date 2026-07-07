import type { Metadata } from "next"
import { Code, Sparkles, Brain, Film, Venus, BookOpen, MapPin, Users, Send } from "lucide-react"
import { PageHero } from "@/components/page-hero"
import { clubs, type Club } from "@/lib/data"

export const metadata: Metadata = {
  title: "Clubs — AASTU Smart Campus",
  description:
    "Discover student clubs at AASTU — from Google Developers Group and CGI to the Females Club and Book Club. Find your community.",
}

const iconMap: Record<Club["icon"], typeof Code> = {
  code: Code,
  sparkles: Sparkles,
  brain: Brain,
  film: Film,
  venus: Venus,
  book: BookOpen,
}

export default function ClubsPage() {
  return (
    <>
      <PageHero
        eyebrow="Student Clubs"
        title="Find your community"
        description="AASTU's clubs are where students build skills, friendships, and lead initiatives. Explore active communities spanning technology, creativity, and wellbeing."
      />

      <section className="mx-auto max-w-7xl px-4 py-16 md:px-6">
        <div className="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
          {clubs.map((club) => {
            const Icon = iconMap[club.icon]
            return (
              <div
                key={club.name}
                className="flex flex-col rounded-2xl border border-border bg-card p-6 transition-all hover:-translate-y-1 hover:border-primary/40 hover:shadow-lg"
              >
                <div className="flex items-center justify-between">
                  <span className="flex h-11 w-11 items-center justify-center rounded-xl bg-secondary text-primary">
                    <Icon className="h-5 w-5" />
                  </span>
                  <span className="flex items-center gap-1.5 rounded-full bg-accent/25 px-3 py-1 text-xs font-medium text-accent-foreground">
                    <Users className="h-3.5 w-3.5" /> {club.members}+ members
                  </span>
                </div>
                <h3 className="mt-4 font-serif text-lg font-semibold leading-snug text-card-foreground">
                  {club.name}
                </h3>
                <p className="mt-2 flex-1 text-sm leading-relaxed text-muted-foreground">{club.description}</p>
                <div className="mt-5 flex items-center justify-between border-t border-border pt-4">
                  <span className="flex items-center gap-1.5 text-xs text-muted-foreground">
                    <MapPin className="h-3.5 w-3.5 text-primary" /> {club.location}
                  </span>
                  <a
                    href={club.telegram}
                    target="_blank"
                    rel="noopener noreferrer"
                    className="flex items-center gap-1.5 rounded-lg bg-secondary px-3 py-1.5 text-xs font-semibold text-primary transition-colors hover:bg-primary hover:text-primary-foreground"
                  >
                    <Send className="h-3.5 w-3.5" /> Join
                  </a>
                </div>
              </div>
            )
          })}
        </div>
      </section>
    </>
  )
}
