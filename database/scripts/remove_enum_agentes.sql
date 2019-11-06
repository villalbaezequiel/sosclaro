ALTER TABLE agentes MODIFY active int(1) UNSIGNED NOT NULL;
UPDATE agentes SET active = 1;
ALTER TABLE my_table ENGINE = InnoDB;
ALTER TABLE regions MODIFY active int(1) UNSIGNED NOT NULL;
UPDATE regions SET active = 1;