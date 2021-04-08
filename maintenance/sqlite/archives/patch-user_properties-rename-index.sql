-- This file is automatically generated using maintenance/generateSchemaChangeSql.php.
-- Source: maintenance/abstractSchemaChanges/patch-user_properties-rename-index.json
-- Do not modify this file directly.
-- See https://www.mediawiki.org/wiki/Manual:Schema_changes
DROP  INDEX user_properties_property;
CREATE TEMPORARY TABLE /*_*/__temp__user_properties AS
SELECT  up_user,  up_property,  up_value
FROM  /*_*/user_properties;
DROP  TABLE  /*_*/user_properties;
CREATE TABLE  /*_*/user_properties (    up_user INTEGER UNSIGNED NOT NULL,    up_property BLOB NOT NULL,    up_value BLOB DEFAULT NULL,    PRIMARY KEY(up_user, up_property)  );
INSERT INTO  /*_*/user_properties (up_user, up_property, up_value)
SELECT  up_user,  up_property,  up_value
FROM  /*_*/__temp__user_properties;
DROP  TABLE /*_*/__temp__user_properties;
CREATE INDEX up_property ON  /*_*/user_properties (up_property);