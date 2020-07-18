IMAGE=icfpc2020:tmp
CONTAINER=icfpc2020-build

.PHONY: build
build:
	docker build -f ./dev/Dockerfile.linux -t $(IMAGE) .
	docker create --name $(CONTAINER) $(IMAGE)
	docker cp $(CONTAINER):/build/vendor.tgz ./dev/artifacts
	docker rm $(CONTAINER)
	docker rmi $(IMAGE)