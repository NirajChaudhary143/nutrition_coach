# Nutrition Coach

A WordPress Full Site Editing (FSE) block theme designed for nutrition coaches and wellness professionals. Built to promote and integrate with the [AllCoach](https://allcoach.io) plugin.

## Requirements

- WordPress 6.0+
- PHP 7.4+
- AllCoach plugin (recommended)

## Features

- Full Site Editing (FSE) with `theme.json` v3 design tokens
- Green health/wellness color palette
- 11 pre-built block patterns covering a complete coaching landing page
- Admin welcome notice to install/activate AllCoach
- No build step required — pure PHP + block markup

## Theme Structure

```
nutrition-coach/
├── style.css                        # Theme registration + base resets
├── theme.json                       # Design tokens (colors, typography, spacing)
├── functions.php                    # Setup, enqueue, includes
├── inc/
│   ├── constants.php                # NC_Constants class
│   ├── assets-manager.php           # Assets_Manager class
│   ├── admin.php                    # NC_Admin — AllCoach welcome notice
│   └── register_block_patterns.php  # Pattern category registration
├── templates/
│   ├── front-page.html              # Landing page (9 pattern sections)
│   ├── index.html
│   ├── single.html
│   ├── page.html
│   ├── page-no-title.html
│   ├── archive.html
│   ├── search.html
│   └── 404.html
├── parts/
│   ├── header.html
│   └── footer.html
└── patterns/
    ├── pattern-header.php           # Site header with nav + CTA buttons
    ├── pattern-footer.php           # 4-column footer with AllCoach credit
    ├── pattern-hero.php             # Hero with headline + stats
    ├── pattern-features.php         # 6-feature grid
    ├── pattern-programs.php         # 3 coaching programs
    ├── pattern-how-it-works.php     # 3-step process
    ├── pattern-coaches.php          # 3 coach profile cards
    ├── pattern-testimonials.php     # 3 client testimonials
    ├── pattern-pricing.php          # 3-tier pricing table
    ├── pattern-faq.php              # 5 FAQs (sticky sidebar layout)
    ├── pattern-cta.php              # Full-width dark green CTA
    └── pattern-new-section.php      # Customisable placeholder section
```

## Color Palette

| Slug         | Hex       | Usage                        |
|--------------|-----------|------------------------------|
| `ink`        | `#0F172A` | Primary text                 |
| `ink-2`      | `#1E293B` | Secondary text               |
| `muted`      | `#64748B` | Captions, subtitles          |
| `rule`       | `#E2E8F0` | Borders, dividers            |
| `surface`    | `#F0FDF4` | Card backgrounds             |
| `base`       | `#FFFFFF` | Page background              |
| `accent`     | `#16A34A` | Primary green (buttons, CTA) |
| `accent-dark`| `#14532D` | Dark green (CTA section)     |

## Installation

1. Upload the `nutrition-coach` folder to `wp-content/themes/`
2. Go to **Appearance → Themes** and activate **Nutrition Coach**
3. Install and activate the **AllCoach** plugin when prompted
4. Go to **Appearance → Editor** to customise templates and patterns

## AllCoach Integration

The theme includes an admin welcome notice that appears on the Dashboard and Themes screens when AllCoach is not yet active. The notice auto-dismisses after 7 days and can be manually dismissed. It links directly to the AllCoach admin page once the plugin is active.

## Development

No build step is required. Edit PHP pattern files directly — WordPress auto-registers any `.php` file in the `patterns/` directory that contains `Title:` and `Slug:` file headers.

To add a new pattern:

1. Create `patterns/pattern-my-section.php`
2. Add the required header:
   ```php
   <?php
   /**
    * Title: Nutrition Coach – My Section
    * Slug: nutrition-coach/my-section
    * Categories: coaching
    * Description: One-line description.
    */
   ?>
   ```
3. Add your block markup below the closing `?>`
4. Add `<!-- wp:pattern {"slug":"nutrition-coach/my-section"} /-->` to the desired template

## License

GNU General Public License v2 or later — https://www.gnu.org/licenses/gpl-2.0.html
