import { NextResponse } from "next/server"

// In-memory store for submitted inquiries.
// Note: this resets when the server restarts. Connect a database
// (e.g. Neon) to persist inquiries permanently.
type Inquiry = {
  id: string
  name: string
  email: string
  subject: string
  message: string
  createdAt: string
}

const inquiries: Inquiry[] = []

function isValidEmail(email: string) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
}

export async function POST(request: Request) {
  let body: Record<string, unknown>
  try {
    body = await request.json()
  } catch {
    return NextResponse.json({ error: "Invalid request body." }, { status: 400 })
  }

  const name = String(body.name ?? "").trim()
  const email = String(body.email ?? "").trim()
  const subject = String(body.subject ?? "").trim()
  const message = String(body.message ?? "").trim()

  const errors: Record<string, string> = {}
  if (name.length < 2) errors.name = "Please enter your full name."
  if (!isValidEmail(email)) errors.email = "Please enter a valid email address."
  if (subject.length < 3) errors.subject = "Please add a subject."
  if (message.length < 10) errors.message = "Your message should be at least 10 characters."

  if (Object.keys(errors).length > 0) {
    return NextResponse.json({ errors }, { status: 422 })
  }

  const inquiry: Inquiry = {
    id: crypto.randomUUID(),
    name,
    email,
    subject,
    message,
    createdAt: new Date().toISOString(),
  }
  inquiries.push(inquiry)

  return NextResponse.json(
    { success: true, message: "Thank you! Your inquiry has been received." },
    { status: 201 },
  )
}

export async function GET() {
  return NextResponse.json({ count: inquiries.length })
}
