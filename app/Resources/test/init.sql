INSERT INTO user (id, username, password) VALUES
  (1, 'admin', '$2y$12$ijIEw4zBbHNhBK4GOh99eukoHCa0BKZCttlhbdNhrrUrjHjS1vViW'),
  (2, 'user', '$2y$12$ijIEw4zBbHNhBK4GOh99eukoHCa0BKZCttlhbdNhrrUrjHjS1vViW');
INSERT INTO role (id, role) VALUES
  (1, 'ROLE_USER'),
  (2, 'ROLE_ADMIN');
INSERT INTO user_role (user_id, role_id) VALUES
  (1, 1),
  (2, 2);
INSERT INTO unit (id, name) VALUES
  (1, 'gram'),
  (2, 'milliliter'),
  (3, 'table spoon'),
  (4, 'spoon'),
  (5, 'cup');
INSERT INTO recipe (id, author_id, title, description, preparation_time, preparation_time_text,created_at,
                    modified_at, prescription) VALUES
  (1, 1, 'Recipe 1', 'Description of recipe 1', 10, 'text 1',
   now(), null, 'prescription of recipe 1'),
  (2, 2, 'Recipe 2', 'Description of recipe 2', 20, 'text 2',
   now(), null, 'prescription of recipe 2');
INSERT INTO ingredient (id, recipe_id, unit_id, name, amount) VALUES
  (1, 1, 1, 'first ingredient', 200),
  (2, 1, 2, 'second ingredient', 100),
  (3, 1, 3, 'third ingredient',  2),
  (4, 2, 4, 'fourth ingredient', 5),
  (5, 2, 5, 'fifth ingredient', 0.5),
  (6, 2, 1, 'sixth ingredient', 200);