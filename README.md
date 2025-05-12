# ManaTeam's Webcup 2025 Site

This is a WordPress website with a custom theme for the Webcup 2025 hackathon.

## Requirements

- DDEV installation with Docker

## Installation

```bash
git clone git@github.com:manateam-webcup/wordpress-2025.git
cd wordpress-2025
ddev config --project-type=wordpress
ddev start
ddev import-db -f db/local.sql.gz
ddev launch wp-admin/
```

## Workflow

- Create a branch from master for each feature (e.g. feat/theme, feat/header, feat/banner, etc)
- Both the front and back will use the same branch
- Frontend devs will need to push their work first
- Backend devs will complete the feature
- Export the database with the required content: `ddev export-db -f db/local.sql.gz`
- Commit your changes to the feature branch
- When the feature is ready, merge the feature branch to master for automatic deployment