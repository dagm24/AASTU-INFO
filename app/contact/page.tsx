import type { Metadata } from "next"
import { MapPin, Mail, Phone, Clock } from "lucide-react"
import { PageHero } from "@/components/page-hero"
import { ContactForm } from "@/components/contact-form"

export const metadata: Metadata = {
  title: "Contact Us — AASTU Smart Campus",
  description:
    "Get in touch with Addis Ababa Science and Technology University. Send an inquiry and find our address, phone, and email.",
}

const details = [
  { icon: MapPin, label: "Address", value: "Kilinto, Akaki Kality Sub-city, Addis Ababa, Ethiopia" },
  { icon: Mail, label: "Email", value: "info@aastu.edu.et" },
  { icon: Phone, label: "Phone", value: "+251 11 888 0800" },
  { icon: Clock, label: "Office Hours", value: "Mon – Fri, 8:30 AM – 5:00 PM" },
]

export default function ContactPage() {
  return (
    <>
      <PageHero
        eyebrow="Contact Us"
        title="We'd love to hear from you"
        description="Have a question about admissions, campus life, or a program? Send us a message and our team will get back to you as soon as possible."
      />

      <section className="mx-auto max-w-7xl px-4 py-16 md:px-6">
        <div className="grid gap-10 lg:grid-cols-5">
          <div className="lg:col-span-2">
            <h2 className="font-serif text-2xl font-bold tracking-tight text-foreground">Get in touch</h2>
            <p className="mt-3 leading-relaxed text-muted-foreground">
              Reach out through the form or use the contact details below. We&apos;re here to help
              students, applicants, and the wider community.
            </p>
            <ul className="mt-8 space-y-4">
              {details.map((item) => {
                const Icon = item.icon
                return (
                  <li key={item.label} className="flex items-start gap-4 rounded-xl border border-border bg-card p-4">
                    <span className="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-secondary text-primary">
                      <Icon className="h-5 w-5" />
                    </span>
                    <div>
                      <p className="text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                        {item.label}
                      </p>
                      <p className="mt-0.5 text-sm text-foreground">{item.value}</p>
                    </div>
                  </li>
                )
              })}
            </ul>
          </div>

          <div className="lg:col-span-3">
            <ContactForm />
          </div>
        </div>
      </section>
    </>
  )
}
