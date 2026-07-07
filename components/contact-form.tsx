"use client"

import { useState } from "react"
import { Send, CheckCircle2, Loader2 } from "lucide-react"

type FieldErrors = Partial<Record<"name" | "email" | "subject" | "message", string>>

export function ContactForm() {
  const [status, setStatus] = useState<"idle" | "loading" | "success">("idle")
  const [errors, setErrors] = useState<FieldErrors>({})
  const [serverError, setServerError] = useState("")

  async function handleSubmit(e: React.FormEvent<HTMLFormElement>) {
    e.preventDefault()
    setStatus("loading")
    setErrors({})
    setServerError("")

    const form = e.currentTarget
    const data = Object.fromEntries(new FormData(form).entries())

    try {
      const res = await fetch("/api/inquiries", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data),
      })

      if (res.ok) {
        setStatus("success")
        form.reset()
        return
      }

      const payload = await res.json()
      if (payload.errors) setErrors(payload.errors)
      else setServerError(payload.error ?? "Something went wrong. Please try again.")
      setStatus("idle")
    } catch {
      setServerError("Unable to send your message. Please check your connection.")
      setStatus("idle")
    }
  }

  if (status === "success") {
    return (
      <div className="flex flex-col items-center justify-center rounded-2xl border border-border bg-card p-10 text-center">
        <span className="flex h-14 w-14 items-center justify-center rounded-full bg-primary/10 text-primary">
          <CheckCircle2 className="h-7 w-7" />
        </span>
        <h3 className="mt-4 font-serif text-xl font-semibold text-card-foreground">Message sent</h3>
        <p className="mt-2 max-w-sm text-sm leading-relaxed text-muted-foreground">
          Thank you for reaching out. Our team has received your inquiry and will get back to you soon.
        </p>
        <button
          onClick={() => setStatus("idle")}
          className="mt-6 rounded-lg border border-border px-4 py-2 text-sm font-semibold text-foreground transition-colors hover:bg-secondary"
        >
          Send another message
        </button>
      </div>
    )
  }

  const inputClass =
    "w-full rounded-lg border border-input bg-background px-3.5 py-2.5 text-sm text-foreground outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-ring/30"

  return (
    <form onSubmit={handleSubmit} className="rounded-2xl border border-border bg-card p-6 md:p-8" noValidate>
      <div className="grid gap-5 sm:grid-cols-2">
        <div>
          <label htmlFor="name" className="mb-1.5 block text-sm font-medium text-foreground">
            Full name
          </label>
          <input id="name" name="name" type="text" placeholder="Abebe Kebede" className={inputClass} />
          {errors.name && <p className="mt-1 text-xs text-primary">{errors.name}</p>}
        </div>
        <div>
          <label htmlFor="email" className="mb-1.5 block text-sm font-medium text-foreground">
            Email address
          </label>
          <input id="email" name="email" type="email" placeholder="you@example.com" className={inputClass} />
          {errors.email && <p className="mt-1 text-xs text-primary">{errors.email}</p>}
        </div>
      </div>

      <div className="mt-5">
        <label htmlFor="subject" className="mb-1.5 block text-sm font-medium text-foreground">
          Subject
        </label>
        <input id="subject" name="subject" type="text" placeholder="How can we help?" className={inputClass} />
        {errors.subject && <p className="mt-1 text-xs text-primary">{errors.subject}</p>}
      </div>

      <div className="mt-5">
        <label htmlFor="message" className="mb-1.5 block text-sm font-medium text-foreground">
          Message
        </label>
        <textarea
          id="message"
          name="message"
          rows={5}
          placeholder="Tell us more about your inquiry..."
          className={`${inputClass} resize-y`}
        />
        {errors.message && <p className="mt-1 text-xs text-primary">{errors.message}</p>}
      </div>

      {serverError && <p className="mt-4 text-sm text-primary">{serverError}</p>}

      <button
        type="submit"
        disabled={status === "loading"}
        className="mt-6 inline-flex items-center gap-2 rounded-lg bg-primary px-5 py-3 text-sm font-semibold text-primary-foreground transition-transform hover:-translate-y-0.5 disabled:cursor-not-allowed disabled:opacity-70"
      >
        {status === "loading" ? (
          <>
            <Loader2 className="h-4 w-4 animate-spin" /> Sending...
          </>
        ) : (
          <>
            <Send className="h-4 w-4" /> Send message
          </>
        )}
      </button>
    </form>
  )
}
