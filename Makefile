phinx = 'vendor/bin/phinx'

all:
	@echo 'usage:'
	@echo '    make migrate'
	@echo '    make status'
	@echo '    make rollback'

migrate:
	$(phinx) migrate -e development

status:
	$(phinx) status

rollback:
	$(phinx) rollback -t 0 -e development

