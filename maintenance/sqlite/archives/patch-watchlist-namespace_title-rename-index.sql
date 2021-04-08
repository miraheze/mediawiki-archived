-- This file is automatically generated using maintenance/generateSchemaChangeSql.php.
-- Source: maintenance/abstractSchemaChanges/patch-watchlist-namespace_title-rename-index.json
-- Do not modify this file directly.
-- See https://www.mediawiki.org/wiki/Manual:Schema_changes
DROP  INDEX wl_user;
DROP  INDEX namespace_title;
DROP  INDEX wl_user_notificationtimestamp;
CREATE TEMPORARY TABLE /*_*/__temp__watchlist AS
SELECT  wl_id,  wl_user,  wl_namespace,  wl_title,  wl_notificationtimestamp
FROM  /*_*/watchlist;
DROP  TABLE  /*_*/watchlist;
CREATE TABLE  /*_*/watchlist (    wl_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,    wl_user INTEGER UNSIGNED NOT NULL,    wl_namespace INTEGER DEFAULT 0 NOT NULL,    wl_title BLOB DEFAULT '' NOT NULL, wl_notificationtimestamp BLOB DEFAULT NULL  );
INSERT INTO  /*_*/watchlist (    wl_id, wl_user, wl_namespace, wl_title,    wl_notificationtimestamp  )
SELECT  wl_id,  wl_user,  wl_namespace,  wl_title,  wl_notificationtimestamp
FROM  /*_*/__temp__watchlist;
DROP  TABLE /*_*/__temp__watchlist;
CREATE UNIQUE INDEX wl_user ON  /*_*/watchlist (wl_user, wl_namespace, wl_title);
CREATE INDEX wl_user_notificationtimestamp ON  /*_*/watchlist (    wl_user, wl_notificationtimestamp  );
CREATE INDEX wl_namespace_title ON  /*_*/watchlist (wl_namespace, wl_title);