# Database Schema

## Core Identity and Access

- `users`
- `permissions`
- `user_permissions`

## Academic Module

- `daily_lesson_logs`
- `cot_ratings`
- `professional_growth`

## Student Support Module

- `students`
- `incident_reports`
- `counseling_interventions`

## Inventory Module

- `assets`
- `asset_assignments`

## Infrastructure Tables

- `sessions`
- `password_reset_tokens`
- `cache`
- `cache_locks`
- `jobs`
- `job_batches`
- `failed_jobs`

## Relationship Summary

- A user has many DLLs, incidents, growth entries, ratings, and asset assignments
- A student has many incident reports
- An incident report has many counseling interventions
- An asset has many assignments and at most one current assignment
