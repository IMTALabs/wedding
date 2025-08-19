---
applyTo: '**'
---

---
applyTo: '**'
---

# Wedding Project AI Assistant Guidelines

## Project Overview
This is a Laravel 12 wedding management application with Livewire components for interactive features. The system handles wedding planning, guest management, vendor coordination, and event scheduling.

## Coding Standards

### PHP/Laravel Standards
- Follow PSR-4 autoloading standards as defined in composer.json
- Use PHP 8.2+ features and syntax
- Follow Laravel 12 conventions and best practices
- Use strict typing where applicable
- Follow camelCase for methods and variables, PascalCase for classes
- Use meaningful, descriptive names for wedding-related entities

### Code Organization
- Place all application code in `app/` directory
- Use proper namespace structure: `App\` as root namespace
- Database factories in `Database\Factories\`
- Database seeders in `Database\Seeders\`
- Tests in `tests/` directory with `Tests\` namespace

### Development Tools
- Use Laravel Pint for code formatting (configured in composer.json)
- Use Laravel Pail for logging and debugging
- Follow PHPUnit testing standards (version 11.5.3+)
- Use Faker for generating test data
- Implement proper error handling with Collision

## Domain Knowledge - Wedding Industry

### Core Wedding Entities
- **Couples**: Bride, Groom, Partners
- **Events**: Wedding ceremony, reception, rehearsal dinner, bachelor/bachelorette parties
- **Guests**: RSVP status, dietary restrictions, plus-ones, seating arrangements
- **Vendors**: Photographers, caterers, florists, musicians, venues
- **Timeline**: Wedding timeline, vendor schedules, guest arrival times
- **Budget**: Cost tracking, vendor payments, expense categories

### Wedding-Specific Features
- RSVP management system
- Seating chart creation
- Wedding timeline coordination
- Vendor contact management
- Guest dietary restrictions tracking
- Gift registry integration
- Wedding website functionality

## Technical Preferences

### Laravel Framework
- Use Laravel 12 features and syntax
- Implement Livewire 3.6+ for interactive components
- Use Laravel Sanctum for API authentication
- Leverage Laravel Socialite for social login integration
- Use Laravel Tinker for debugging and testing

### Database
- Use SQLite for development (as configured in composer scripts)
- Design normalized database schema for wedding entities
- Implement proper relationships between models
- Use Laravel migrations for database changes

### Frontend Integration
- Use Livewire components for dynamic wedding features
- Implement responsive design for mobile wedding planning
- Consider accessibility for all age groups attending weddings

### Development Workflow
- Use the configured `dev` script for concurrent development:
  - Laravel server
  - Queue processing
  - Log monitoring with Pail
  - Vite for asset compilation
- Implement proper queue handling for email notifications
- Use Laravel's built-in testing features

## AI Behavior Guidelines

### Code Generation
- Always consider wedding industry context when naming variables/methods
- Implement proper validation for wedding-related data
- Consider timezone handling for wedding events
- Include appropriate error handling for critical wedding features

### Security Considerations
- Protect sensitive guest information
- Implement proper authentication for wedding planning access
- Secure vendor contact information
- Handle payment information appropriately

### Performance
- Optimize for mobile devices (wedding planning on-the-go)
- Consider caching for frequently accessed wedding data
- Implement efficient querying for large guest lists

### Communication
- Use wedding industry terminology appropriately
- Consider cultural sensitivity in wedding traditions
- Provide clear, non-technical explanations for end users
- Focus on user experience for stressed wedding planners

## File Structure Expectations
```
/var/www/html/wedding/
├── src/                    # Laravel application root
│   ├── app/               # Application code
│   ├── database/          # Migrations, factories, seeders
│   ├── tests/            # Test files
│   └── composer.json     # Dependencies and scripts
└── .github/
    └── instructions/     # AI guidelines (this file)
```

## Quality Standards
- Write comprehensive tests for wedding-critical features
- Document complex wedding business logic
- Ensure graceful handling of edge cases
- Prioritize data integrity for wedding information
- Implement proper backup strategies for wedding data
