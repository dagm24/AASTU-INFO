import type { Metadata } from "next"
import { Source_Sans_3, Fraunces } from "next/font/google"
import { Navbar } from "@/components/navbar"
import { Footer } from "@/components/footer"
import "./globals.css"

const sourceSans = Source_Sans_3({
  subsets: ["latin"],
  variable: "--font-sans",
  display: "swap",
})

const fraunces = Fraunces({
  subsets: ["latin"],
  variable: "--font-serif",
  display: "swap",
})

export const metadata: Metadata = {
  title: "AASTU Smart Campus — Addis Ababa Science & Technology University",
  description:
    "The official smart campus portal for Addis Ababa Science and Technology University: academics, admissions, colleges, student union, clubs, and campus life.",
  keywords: [
    "AASTU",
    "Addis Ababa Science and Technology University",
    "academics",
    "admission",
    "student union",
    "clubs",
    "Ethiopia university",
  ],
}

export const viewport = {
  themeColor: "#264fa0",
}

export default function RootLayout({
  children,
}: {
  children: React.ReactNode
}) {
  return (
    <html lang="en" className={`${sourceSans.variable} ${fraunces.variable} bg-background`}>
      <body className="min-h-screen antialiased">
        <Navbar />
        <main>{children}</main>
        <Footer />
      </body>
    </html>
  )
}
