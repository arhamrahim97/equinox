import { precacheAndRoute } from "workbox-precaching";
import { Route } from "workbox-routing";
import { CacheFirst, NetworkOnly } from "workbox-strategies";
import { ExpirationPlugin } from "workbox-expiration";
import { registerRoute } from "workbox-routing";
import { setDefaultHandler } from "workbox-routing";
import { offlineFallback } from "workbox-recipes";

precacheAndRoute(self.__WB_MANIFEST || []);
setDefaultHandler(new NetworkOnly());

self.addEventListener("message", (event) => {
    if (event.data && event.data.type === "SKIP_WAITING") {
        self.skipWaiting();
    }
});

// Handle images:
const imageRoute = new Route(
    ({ request, sameOrigin }) =>
        sameOrigin && request.url.match(/\.(?:png|jpg|jpeg|svg)$/),
    new CacheFirst({
        cacheName: "images",
        plugins: [
            new ExpirationPlugin({
                maxEntries: 30,
                maxAgeSeconds: 60 * 60 * 24 * 30,
            }),
        ],
    }),
    "GET"
);

const staticsRoute = new Route(
    ({ request }) => request.url.match(/\.(?:js|css)$/),
    new CacheFirst({
        cacheName: "statics",
    }),
    "GET"
);

registerRoute(imageRoute);
registerRoute(staticsRoute);
offlineFallback();
