import { gsap } from "gsap";

Barbar.Dispatcher.on(
    "newPageReady",
    function (currentStatus, olStatus, container) {
        const olPage = olStatus.container;
        const newPage = container;

        gsap.fromTo(newPage, {
            x: "-100%",
            duration: 0.5,
            ease: "power3.inOut",
        });
        gsap.fromTo(newPage, { x: "0%", duration: 0.5, ease: "power3.inOut" });
    }
);
