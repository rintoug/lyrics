<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ url('sitemap_song.xml') }}</loc>
        <lastmod>{{ $song->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('sitemap_artist.xml') }}</loc>
        <lastmod>{{ $artist->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('sitemap_album.xml') }}</loc>
        <lastmod>{{ $album->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap
</sitemapindex>