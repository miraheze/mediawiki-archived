-- This file is automatically generated using maintenance/generateSchemaChangeSql.php.
-- Source: maintenance/abstractSchemaChanges/patch-user-user_is_temp.json
-- Do not modify this file directly.
-- See https://www.mediawiki.org/wiki/Manual:Schema_changes
ALTER TABLE  "user"
ADD  user_is_temp SMALLINT DEFAULT 0 NOT NULL;