Pmanager

This is a project management system built on Laravel 5.5 and mysql.

Story:
1. Company - A company has and belongs to many users and projects.
2. Project - A project belongs to many users. Belongs to a company and has many tasks.
3. User - A user has and belongs to many companies, projects and tasks.
4. Post - A post belongs to a user and a task.
5. Taks - A task has a belongs to many posts.
6. Comment - A comment belongs to a user and a post.

Actors:
1. Admin - Manages everything. Runs the site.
2. Moderators - Staff that is employed by the Admin to manage the site.
3. Project Manager - Creates the project and add users.
4. Project Members - Other users that are added as team members. Each member can either be a 'team lead' or just 'member'.

