
self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open('mo-store').then((cache) => cache.addAll([
      './orcamento-pdf.html',
      './assets/imagens/logo_mo.png'
    ])),
  );
});

self.addEventListener('fetch', (e) => {
  e.respondWith(
    caches.match(e.request).then((response) => response || fetch(e.request)),
  );
});
