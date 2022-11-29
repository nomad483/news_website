FROM node:16.18-alpine

# Create app directory
#RUN mkdir -p /usr/src/app
WORKDIR /app/web

# Installing dependencies

COPY package*.json .
COPY yarn.lock .
#RUN yarn install

RUN yarn install --frozen-lockfile
# Copying source files
COPY . /app/web

# Building app
#RUN yarn build

EXPOSE 3000

ENV PORT 3000

# Running the app
CMD ["yarn", "dev"]
