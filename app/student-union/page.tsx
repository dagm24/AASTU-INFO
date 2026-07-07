import type { Metadata } from "next"
import { Linkedin, Send, Users } from "lucide-react"
import { PageHero } from "@/components/page-hero"
import { Avatar } from "@/components/avatar"
import { unionMembers, offices } from "@/lib/data"

export const metadata: Metadata = {
  title: "Student Union — AASTU Smart Campus",
  description:
    "Meet the AASTU Student Union representatives and explore the offices that serve and advocate for students across campus.",
}

export default function StudentUnionPage() {
  return (
    <>
      <PageHero
        eyebrow="Student Union"
        title="Your voice on campus"
        description="The AASTU Student Union is a body of elected representatives who advocate for students, coordinate services, and connect the student community with the administration."
      />

      <section className="mx-auto max-w-7xl px-4 py-16 md:px-6">
        <div className="max-w-2xl">
          <p className="text-sm font-semibold uppercase tracking-widest text-primary">Representatives</p>
          <h2 className="mt-3 text-balance font-serif text-3xl font-bold tracking-tight text-foreground md:text-4xl">
            The elected team
          </h2>
        </div>
        <div className="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
          {unionMembers.map((member) => (
            <div key={member.name} className="rounded-2xl border border-border bg-card p-6 text-center">
              <div className="flex justify-center">
                <Avatar name={member.name} size={72} />
              </div>
              <h3 className="mt-4 font-serif text-base font-semibold text-card-foreground">{member.name}</h3>
              <p className="text-sm text-primary">{member.role}</p>
              <div className="mt-4 flex justify-center gap-2">
                <a
                  href={member.linkedin}
                  target="_blank"
                  rel="noopener noreferrer"
                  aria-label={`${member.name} on LinkedIn`}
                  className="flex h-9 w-9 items-center justify-center rounded-lg bg-secondary text-primary transition-colors hover:bg-primary hover:text-primary-foreground"
                >
                  <Linkedin className="h-4 w-4" />
                </a>
                <a
                  href={member.telegram}
                  target="_blank"
                  rel="noopener noreferrer"
                  aria-label={`${member.name} on Telegram`}
                  className="flex h-9 w-9 items-center justify-center rounded-lg bg-secondary text-primary transition-colors hover:bg-primary hover:text-primary-foreground"
                >
                  <Send className="h-4 w-4" />
                </a>
              </div>
            </div>
          ))}
        </div>
      </section>

      <section className="mx-auto max-w-7xl px-4 pb-20 md:px-6">
        <div className="max-w-2xl">
          <p className="text-sm font-semibold uppercase tracking-widest text-primary">Union offices</p>
          <h2 className="mt-3 text-balance font-serif text-3xl font-bold tracking-tight text-foreground md:text-4xl">
            Offices that serve students
          </h2>
          <p className="mt-3 leading-relaxed text-muted-foreground">
            The union is organized into specialized offices, each responsible for a key aspect of campus life.
          </p>
        </div>
        <div className="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
          {offices.map((office) => (
            <div
              key={office.title}
              className="rounded-2xl border border-border bg-card p-6 transition-colors hover:border-primary/40"
            >
              <div className="flex items-center gap-3">
                <span className="flex h-10 w-10 items-center justify-center rounded-lg bg-secondary text-primary">
                  <Users className="h-5 w-5" />
                </span>
                <h3 className="font-serif text-lg font-semibold text-card-foreground">{office.title}</h3>
              </div>
              <p className="mt-3 text-sm font-medium text-foreground">{office.summary}</p>
              <p className="mt-2 text-sm leading-relaxed text-muted-foreground">{office.details}</p>
            </div>
          ))}
        </div>
      </section>
    </>
  )
}
