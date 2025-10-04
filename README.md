

# This is a Laravel CMS with authentication and profile management.
- Users can register, log in, and update their personal profile data.
- Only authenticated users can access posts and the dashboard (enforced via custom AuthMiddleware)
- Users can create, view, and manage multiple posts, with pagination for easy navigation.
- Included policies to restrict edit/delete to post owners.


# Soft Delete
Implemented soft delete for posts so that deleted posts remain in the database.

- All users can view the list of deleted posts.
- Only the owner of a post can restore it.
- Soft-deleted posts are paginated for easy navigation.
- Restoration is enforced via PostPolicy to ensure ownership.

Built with Laravel 10 version.
