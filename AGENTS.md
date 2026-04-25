
## Phrases and I18n (Required)
- Do not hardcode English UI text in templates, controllers, services, repositories, JS, or admin/public output.
- Use XenForo phrases for all user/admin-facing text.
- Add/update phrase definitions in `_output/phrases/*` and reference them via `phrase()`/template phrase syntax.
- Treat hardcoded English as a release blocker unless the string is an internal-only debug token not shown to users/admins.

## Version ID Synchronization (Required)
- Treat `addon.json` `version_id` as the single source of truth for addon asset/version metadata.
- When manually creating or editing phrases, templates, template modifications, options, permissions, routes, style properties, or class extensions, ensure their `version_id`/`version_string` metadata matches the current `addon.json` values.
- Keep GUI-created assets, file metadata, and XenForo DB records aligned to the same current addon version before release.
- Do not ship mixed or stale `version_id` values; version mismatches are a release blocker because installer/upgrader asset update detection depends on them.
