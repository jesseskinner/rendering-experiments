# rendering-experiments
Some experiments comparing client-side and server-side rendering techniques.

# Conclusions so far...

- Gzipping can level the playing field for JSON vs HTML rendered size / bandwidth usage
- The browser is better at showing partial rendered HTML quickly
- Need to find a way to smoothly simulate partial rendering on the client-side
- Client side is able to get a complete shell up sooner (eg. footer), for better or worse
