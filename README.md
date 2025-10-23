

# This is a Laravel CMS with authentication and profile management.
- Users can register, log in, and update their personal profile data.
- Only authenticated users can access posts and the dashboard (enforced via custom AuthMiddleware)
- Users can create, view, and manage multiple posts, with pagination for easy navigation.
- Included policies to restrict edit/delete to post owners.

# User Registration Welcome Email:
- Users receive a welcome email immediately after registering
- Used Laravel Events (UserRegistered) and Listeners (SendWelcomeEmail) to trigger emails.
- Emails are queued using Laravel’s database queue for better performance.
- Implemented ShouldQueue on both listener and mailable for async processing.
- Queue worker processes emails without blocking user registration flow.
- Email template uses Blade Markdown components for a clean, responsive design.

# Soft Delete
Implemented soft delete for posts so that deleted posts remain in the database.

- All users can view the list of deleted posts.
- Only the owner of a post can restore it.
- Soft-deleted posts are paginated for easy navigation.
- Restoration is enforced via PostPolicy to ensure ownership.

Built with Laravel 10 version.
