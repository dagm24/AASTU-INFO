import type { Metadata } from "next"
import { Clock, MapPin, GraduationCap } from "lucide-react"
import { PageHero } from "@/components/page-hero"
import { engineeringPrograms, appliedSciencePrograms, type Program } from "@/lib/data"

export const metadata: Metadata = {
  title: "Academics — AASTU Smart Campus",
  description:
    "Explore undergraduate programs at AASTU across engineering and applied sciences, from Software and Civil Engineering to Biotechnology and Geology.",
}

function ProgramCard({ program }: { program: Program }) {
  return (
    <div className="flex flex-col rounded-2xl border border-border bg-card p-6 transition-all hover:-translate-y-1 hover:border-primary/40 hover:shadow-lg">
      <span className="flex h-10 w-10 items-center justify-center rounded-lg bg-secondary text-primary">
        <GraduationCap className="h-5 w-5" />
      </span>
      <h3 className="mt-4 font-serif text-lg font-semibold leading-snug text-card-foreground">
        {program.name}
      </h3>
      <p className="mt-2 flex-1 text-sm leading-relaxed text-muted-foreground">{program.description}</p>
      <div className="mt-4 flex flex-wrap gap-x-4 gap-y-1 border-t border-border pt-4 text-xs text-muted-foreground">
        <span className="flex items-center gap-1.5">
          <Clock className="h-3.5 w-3.5 text-primary" /> {program.duration} years
        </span>
        <span className="flex items-center gap-1.5">
          <MapPin className="h-3.5 w-3.5 text-primary" /> Addis Ababa
        </span>
      </div>
    </div>
  )
}

function ProgramSection({ title, subtitle, programs }: { title: string; subtitle: string; programs: Program[] }) {
  return (
    <section className="mx-auto max-w-7xl px-4 py-12 md:px-6">
      <div className="max-w-2xl">
        <h2 className="text-balance font-serif text-2xl font-bold tracking-tight text-foreground md:text-3xl">
          {title}
        </h2>
        <p className="mt-2 leading-relaxed text-muted-foreground">{subtitle}</p>
      </div>
      <div className="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        {programs.map((program) => (
          <ProgramCard key={program.name} program={program} />
        ))}
      </div>
    </section>
  )
}

export default function AcademicsPage() {
  return (
    <>
      <PageHero
        eyebrow="Academics"
        title="Undergraduate programs built for the future"
        description="AASTU offers rigorous, practice-oriented degrees across engineering and applied sciences, preparing graduates to lead in industry, research, and innovation."
      />
      <ProgramSection
        title="Engineering Programs"
        subtitle="Five-year professional degrees across our engineering colleges."
        programs={engineeringPrograms}
      />
      <ProgramSection
        title="Applied Science Programs"
        subtitle="Four-year science degrees grounded in research and real-world application."
        programs={appliedSciencePrograms}
      />
    </>
  )
}
