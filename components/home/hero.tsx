import Link from "next/link"
import { ArrowRight, Sparkles } from "lucide-react"

export function Hero() {
  return (
    <section className="relative overflow-hidden">
      <div className="absolute inset-0">
        <img
          src="/images/campus-hero.png"
          alt="Aerial view of the AASTU campus at golden hour"
          className="h-full w-full object-cover"
        />
        <div className="absolute inset-0 bg-gradient-to-r from-primary/95 via-primary/80 to-primary/40" />
      </div>

      <div className="relative mx-auto flex max-w-7xl flex-col px-4 py-24 md:px-6 md:py-36">
        <div className="inline-flex w-fit items-center gap-2 rounded-full border border-primary-foreground/25 bg-primary-foreground/10 px-3 py-1 text-xs font-medium text-primary-foreground backdrop-blur-sm">
          <Sparkles className="h-3.5 w-3.5" />
          Addis Ababa Science &amp; Technology University
        </div>
        <h1 className="mt-6 max-w-3xl text-balance font-serif text-4xl font-bold leading-tight tracking-tight text-primary-foreground md:text-6xl">
          Your smart campus, all in one place.
        </h1>
        <p className="mt-5 max-w-xl text-pretty text-lg leading-relaxed text-primary-foreground/85">
          Explore academic programs, discover student clubs, meet your student union, and navigate
          every college and block on campus — the modern gateway to life at AASTU.
        </p>
        <div className="mt-8 flex flex-wrap gap-3">
          <Link
            href="/academics"
            className="inline-flex items-center gap-2 rounded-lg bg-accent px-5 py-3 text-sm font-semibold text-accent-foreground transition-transform hover:-translate-y-0.5"
          >
            Explore Academics
            <ArrowRight className="h-4 w-4" />
          </Link>
          <Link
            href="/admission"
            className="inline-flex items-center gap-2 rounded-lg border border-primary-foreground/30 bg-primary-foreground/10 px-5 py-3 text-sm font-semibold text-primary-foreground backdrop-blur-sm transition-colors hover:bg-primary-foreground/20"
          >
            How to Apply
          </Link>
        </div>
      </div>
    </section>
  )
}
