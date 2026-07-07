import { Hero } from "@/components/home/hero"
import { QuickLinks } from "@/components/home/quick-links"
import { Stats, CampusLife } from "@/components/home/highlights"

export default function HomePage() {
  return (
    <>
      <Hero />
      <Stats />
      <QuickLinks />
      <CampusLife />
    </>
  )
}
