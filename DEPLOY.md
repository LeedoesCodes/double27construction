# Deploying the Double 27 demo (free staging)

This app is a Laravel 13 + Filament site using SQLite. It ships with a
`Dockerfile` and a Render blueprint so it can be deployed for free.

The demo **re-seeds itself on every boot** (`migrate:fresh --seed`), so it
always shows the same showcase content. Contact-form messages are therefore
temporary — fine for a review, not for production.

## Option A — Render (recommended, free, no credit card)

1. Push this project to a GitHub repository (see below).
2. Go to <https://render.com> and sign up (GitHub login is easiest).
3. Click **New +  →  Blueprint**, then connect this repository.
   Render reads `render.yaml` and configures everything automatically.
4. Click **Apply**. First build takes ~3–5 minutes.
5. Your site will be live at `https://double27-demo.onrender.com`
   (admin at `/admin`).

> Free Render services sleep after ~15 min idle; the first visit after that
> takes ~30–50s to wake. Fine for a client review.

## Option B — Railway

1. Push to GitHub (below).
2. <https://railway.app> → **New Project → Deploy from GitHub repo**.
3. Railway detects the `Dockerfile` and builds it. Add a public domain
   under the service's **Settings → Networking → Generate Domain**.

## Pushing to GitHub

Create an empty repo on github.com (no README), then from this folder:

```bash
git remote add origin https://github.com/<you>/double27-construction.git
git push -u origin main
```

## Notes

- `APP_KEY` is generated automatically (Render blueprint / entrypoint).
- `APP_URL` is set automatically from the platform's URL so images and
  assets load correctly.
- To make this a real production site later: use a persistent database,
  stop the `migrate:fresh` re-seed, and configure real email for the
  contact form.
