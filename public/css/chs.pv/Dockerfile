FROM node:11
COPY ./ /app
WORKDIR /app
RUN yarn install
RUN yarn run stage-build
CMD ["yarn", "start"]
