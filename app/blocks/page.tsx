"use client"

import { useState } from "react"
import { Building2, BookOpen, BedDouble, MapPin } from "lucide-react"
import { PageHero } from "@/components/page-hero"
import { blocks, type Block } from "@/lib/data"

const categories = ["All", "College", "Facility", "Dormitory"] as const
type Category = (typeof categories)[number]

const categoryIcon: Record<Block["category"], typeof Building2> = {
  College: Building2,
  Facility: BookOpen,
  Dormitory: BedDouble,
}

export default function BlocksPage() {
  const [active, setActive] = useState<Category>("All")

  const filtered = active === "All" ? blocks : blocks.filter((b) => b.category === active)

  return (
    <>
      <PageHero
        eyebrow="Blocks & Colleges"
        title="Navigate every corner of campus"
        description="From colleges and libraries to clinics and dormitories, find the block you're looking for and learn what each one offers."
      />

      <section className="mx-auto max-w-7xl px-4 py-16 md:px-6">
        <div className="flex flex-wrap gap-2">
          {categories.map((cat) => (
            <button
              key={cat}
              onClick={() => setActive(cat)}
              className={`rounded-full px-4 py-2 text-sm font-medium transition-colors ${
                active === cat
                  ? "bg-primary text-primary-foreground"
                  : "border border-border bg-card text-muted-foreground hover:border-primary/40"
              }`}
            >
              {cat}
            </button>
          ))}
        </div>

        <div className="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
          {filtered.map((block) => {
            const Icon = categoryIcon[block.category]
            return (
              <div
                key={block.name}
                className="flex flex-col rounded-2xl border border-border bg-card p-6 transition-colors hover:border-primary/40"
              >
                <div className="flex items-center justify-between">
                  <span className="flex h-11 w-11 items-center justify-center rounded-xl bg-secondary text-primary">
                    <Icon className="h-5 w-5" />
                  </span>
                  <span className="flex items-center gap-1.5 rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">
                    <MapPin className="h-3.5 w-3.5" /> Block {block.blockNumber}
                  </span>
                </div>
                <h3 className="mt-4 font-serif text-lg font-semibold leading-snug text-card-foreground">
                  {block.name}
                </h3>
                <p className="mt-2 text-sm font-medium text-foreground">{block.summary}</p>
                <p className="mt-2 flex-1 text-sm leading-relaxed text-muted-foreground">{block.description}</p>
                <span className="mt-4 w-fit rounded-md bg-secondary px-2 py-1 text-xs font-medium text-secondary-foreground">
                  {block.category}
                </span>
              </div>
            )
          })}
        </div>
      </section>
    </>
  )
}
