import type { Metadata } from "next"
import Link from "next/link"
import { CheckCircle2, ArrowRight } from "lucide-react"
import { PageHero } from "@/components/page-hero"
import { admissionRequirements, admissionSteps } from "@/lib/data"

export const metadata: Metadata = {
  title: "Admission — AASTU Smart Campus",
  description:
    "Everything you need to know to join AASTU: entrance requirements, the step-by-step admission process, and registration guidance.",
}

export default function AdmissionPage() {
  return (
    <>
      <PageHero
        eyebrow="Admission"
        title="Begin your journey at AASTU"
        description="Admission to AASTU is based on national placement through the Ethiopian University Entrance Examination. Here is everything you need to prepare and enroll with confidence."
      />

      <section className="mx-auto max-w-7xl px-4 py-16 md:px-6">
        <div className="max-w-2xl">
          <p className="text-sm font-semibold uppercase tracking-widest text-primary">The process</p>
          <h2 className="mt-3 text-balance font-serif text-3xl font-bold tracking-tight text-foreground md:text-4xl">
            Four steps to enrollment
          </h2>
        </div>
        <div className="mt-10 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
          {admissionSteps.map((step) => (
            <div key={step.step} className="relative rounded-2xl border border-border bg-card p-6">
              <span className="font-serif text-4xl font-bold text-accent">{step.step}</span>
              <h3 className="mt-3 font-serif text-lg font-semibold text-card-foreground">{step.title}</h3>
              <p className="mt-2 text-sm leading-relaxed text-muted-foreground">{step.description}</p>
            </div>
          ))}
        </div>
      </section>

      <section className="mx-auto max-w-7xl px-4 pb-16 md:px-6">
        <div className="grid gap-8 rounded-3xl border border-border bg-secondary/40 p-8 md:grid-cols-5 md:p-12">
          <div className="md:col-span-2">
            <p className="text-sm font-semibold uppercase tracking-widest text-primary">Requirements</p>
            <h2 className="mt-3 text-balance font-serif text-2xl font-bold tracking-tight text-foreground md:text-3xl">
              What you&apos;ll need
            </h2>
            <p className="mt-3 leading-relaxed text-muted-foreground">
              Make sure you have the following documents and qualifications ready before registration day.
            </p>
          </div>
          <ul className="space-y-4 md:col-span-3">
            {admissionRequirements.map((req) => (
              <li key={req} className="flex items-start gap-3 rounded-xl border border-border bg-card p-4">
                <CheckCircle2 className="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                <span className="text-sm leading-relaxed text-foreground">{req}</span>
              </li>
            ))}
          </ul>
        </div>
      </section>

      <section className="mx-auto max-w-7xl px-4 pb-20 md:px-6">
        <div className="flex flex-col items-start justify-between gap-6 rounded-3xl bg-primary p-8 text-primary-foreground md:flex-row md:items-center md:p-12">
          <div>
            <h2 className="text-balance font-serif text-2xl font-bold md:text-3xl">Have questions about applying?</h2>
            <p className="mt-2 max-w-xl text-primary-foreground/80">
              Reach out to our team and we&apos;ll help you navigate placement, registration, and campus life.
            </p>
          </div>
          <Link
            href="/contact"
            className="inline-flex shrink-0 items-center gap-2 rounded-lg bg-accent px-5 py-3 text-sm font-semibold text-accent-foreground transition-transform hover:-translate-y-0.5"
          >
            Contact Us
            <ArrowRight className="h-4 w-4" />
          </Link>
        </div>
      </section>
    </>
  )
}
