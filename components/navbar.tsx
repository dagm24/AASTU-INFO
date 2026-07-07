"use client"

import { useState } from "react"
import Link from "next/link"
import { usePathname } from "next/navigation"
import { Menu, X, ChevronDown, GraduationCap } from "lucide-react"

const mainLinks = [
  { href: "/", label: "Home" },
  { href: "/about", label: "About Us" },
  { href: "/academics", label: "Academics" },
  { href: "/admission", label: "Admission" },
  { href: "/student-union", label: "Student Union" },
]

const studentLifeLinks = [
  { href: "/clubs", label: "Clubs" },
  { href: "/blocks", label: "Blocks & Colleges" },
  { href: "/religious", label: "Religious Associations" },
]

export function Navbar() {
  const [mobileOpen, setMobileOpen] = useState(false)
  const [studentLifeOpen, setStudentLifeOpen] = useState(false)
  const pathname = usePathname()

  const isActive = (href: string) =>
    href === "/" ? pathname === "/" : pathname.startsWith(href)

  return (
    <header className="sticky top-0 z-50 border-b border-border bg-background/90 backdrop-blur-md">
      <nav className="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-3 md:px-6">
        <Link href="/" className="flex items-center gap-2" onClick={() => setMobileOpen(false)}>
          <span className="flex h-9 w-9 items-center justify-center rounded-lg bg-primary text-primary-foreground">
            <GraduationCap className="h-5 w-5" />
          </span>
          <span className="font-serif text-lg font-bold leading-none tracking-tight text-foreground">
            AASTU
            <span className="ml-1 text-primary">Campus</span>
          </span>
        </Link>

        {/* Desktop nav */}
        <div className="hidden items-center gap-1 lg:flex">
          {mainLinks.map((link) => (
            <Link
              key={link.href}
              href={link.href}
              className={`rounded-md px-3 py-2 text-sm font-medium transition-colors hover:bg-secondary hover:text-secondary-foreground ${
                isActive(link.href) ? "text-primary" : "text-muted-foreground"
              }`}
            >
              {link.label}
            </Link>
          ))}

          <div className="group relative">
            <button className="flex items-center gap-1 rounded-md px-3 py-2 text-sm font-medium text-muted-foreground transition-colors hover:bg-secondary hover:text-secondary-foreground">
              Student Life
              <ChevronDown className="h-4 w-4 transition-transform group-hover:rotate-180" />
            </button>
            <div className="invisible absolute right-0 top-full w-56 translate-y-1 rounded-xl border border-border bg-popover p-1.5 opacity-0 shadow-lg transition-all group-hover:visible group-hover:translate-y-0 group-hover:opacity-100">
              {studentLifeLinks.map((link) => (
                <Link
                  key={link.href}
                  href={link.href}
                  className="block rounded-lg px-3 py-2 text-sm text-popover-foreground transition-colors hover:bg-secondary"
                >
                  {link.label}
                </Link>
              ))}
            </div>
          </div>
        </div>

        <div className="flex items-center gap-2">
          <Link
            href="/contact"
            className="hidden rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-primary-foreground transition-colors hover:opacity-90 sm:inline-block"
          >
            Contact Us
          </Link>
          <button
            className="rounded-md p-2 text-foreground lg:hidden"
            onClick={() => setMobileOpen((o) => !o)}
            aria-label="Toggle menu"
            aria-expanded={mobileOpen}
          >
            {mobileOpen ? <X className="h-6 w-6" /> : <Menu className="h-6 w-6" />}
          </button>
        </div>
      </nav>

      {/* Mobile nav */}
      {mobileOpen && (
        <div className="border-t border-border bg-background px-4 py-3 lg:hidden">
          <div className="flex flex-col gap-1">
            {mainLinks.map((link) => (
              <Link
                key={link.href}
                href={link.href}
                onClick={() => setMobileOpen(false)}
                className={`rounded-md px-3 py-2 text-sm font-medium ${
                  isActive(link.href) ? "bg-secondary text-primary" : "text-muted-foreground"
                }`}
              >
                {link.label}
              </Link>
            ))}

            <button
              onClick={() => setStudentLifeOpen((o) => !o)}
              className="flex items-center justify-between rounded-md px-3 py-2 text-sm font-medium text-muted-foreground"
            >
              Student Life
              <ChevronDown className={`h-4 w-4 transition-transform ${studentLifeOpen ? "rotate-180" : ""}`} />
            </button>
            {studentLifeOpen &&
              studentLifeLinks.map((link) => (
                <Link
                  key={link.href}
                  href={link.href}
                  onClick={() => setMobileOpen(false)}
                  className="rounded-md px-6 py-2 text-sm text-muted-foreground"
                >
                  {link.label}
                </Link>
              ))}

            <Link
              href="/contact"
              onClick={() => setMobileOpen(false)}
              className="mt-2 rounded-lg bg-primary px-4 py-2 text-center text-sm font-semibold text-primary-foreground"
            >
              Contact Us
            </Link>
          </div>
        </div>
      )}
    </header>
  )
}
