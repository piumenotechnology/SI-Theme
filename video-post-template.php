<?php

/**
 * Template Name: Video Post Template
 * Template Post Type: post, page
 */

$resources = get_field('post_details');
$relatedTitle = get_field('related_articles_title', 'options');
$author_avatar = (is_array($resources) && isset($resources['company_logo']['url']) && $resources['company_logo']['url'])
    ? $resources['company_logo']['url']
    : get_template_directory_uri() . '/assets/icons/si_logo.jpg';
$attachments = $resources['attachments'];
?>
<?php get_header(); ?>

<section class="post background-grey no-space step py-12 mt-24 md:mt-32" data-animate-enter="main-nav--solid">
    <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8 container mx-auto">
        <div class="col-span-2 space-y-6">
            <div class="video-container"></div>

            <div class="flex justify-between items-center text-md mt-6">
                <div class="flex items-center">
                    <span class="mr-4">Duration</span>
                    <span><b><?= $resources['video_duration']; ?></b></span>
                </div>
                <div class="inline-flex items-center">
                    <button class="flex ui-link border border-solid border-black text-sm relative" onclick="copyVideoLink()">
                        <span class="copy-text mr-2">Copy Link</span>
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <path d="M172.5 131.1C228.1 75.51 320.5 75.51 376.1 131.1C426.1 181.1 433.5 260.8 392.4 318.3L391.3 319.9C381 334.2 361 337.6 346.7 327.3C332.3 317 328.9 297 339.2 282.7L340.3 281.1C363.2 249 359.6 205.1 331.7 177.2C300.3 145.8 249.2 145.8 217.7 177.2L105.5 289.5C73.99 320.1 73.99 372 105.5 403.5C133.3 431.4 177.3 435 209.3 412.1L210.9 410.1C225.3 400.7 245.3 404 255.5 418.4C265.8 432.8 262.5 452.8 248.1 463.1L246.5 464.2C188.1 505.3 110.2 498.7 60.21 448.8C3.741 392.3 3.741 300.7 60.21 244.3L172.5 131.1zM467.5 380C411 436.5 319.5 436.5 263 380C213 330 206.5 251.2 247.6 193.7L248.7 192.1C258.1 177.8 278.1 174.4 293.3 184.7C307.7 194.1 311.1 214.1 300.8 229.3L299.7 230.9C276.8 262.1 280.4 306.9 308.3 334.8C339.7 366.2 390.8 366.2 422.3 334.8L534.5 222.5C566 191 566 139.1 534.5 108.5C506.7 80.63 462.7 76.99 430.7 99.9L429.1 101C414.7 111.3 394.7 107.1 384.5 93.58C374.2 79.2 377.5 59.21 391.9 48.94L393.5 47.82C451 6.731 529.8 13.25 579.8 63.24C636.3 119.7 636.3 211.3 579.8 267.7L467.5 380z" />
                        </svg>
                    </button>
                </div>
            </div>

            <h2 class="text-2xl md:text-3xl font-bold mt-6">
                <?php the_title(); ?>
            </h2>

            <div class="prose max-w-none text-gray-800 mt-4 description">
                <?php the_content(); ?>
            </div>
        </div>

        <div class="col-span-1 md:border-l md:pl-8 border-gray md:sticky md:top-[160px] md:h-[500px] md:max-h-[500px] mt-8 md:mt-0">
            <h3 class="text-md text-left font-bold text-neutral-700">Timestamp</h3>
            <div class="topics mt-2 space-y-2">
                <div class="topic cursor-pointer flex items-center justify-between text-black rounded-lg transition duration-300" onclick="jumpToTime(30, this)">
                    <span class="mr-4 w-[85%] break-words">Topic 1</span>
                    <span class="indicator w-3 h-3 rounded-full transition flex-shrink-0"></span>
                </div>
                <div class="topic cursor-pointer flex items-center justify-between text-black rounded-lg transition duration-300 mt-4" onclick="jumpToTime(60, this)">
                    <span class="mr-4 w-[85%] break-words">Topic 2</span>
                    <span class="indicator w-3 h-3 rounded-full transition flex-shrink-0"></span>
                </div>
                <div class="topic cursor-pointer flex items-center justify-between text-black rounded-lg transition duration-300 mt-4" onclick="jumpToTime(120, this)">
                    <span class="mr-4 w-[85%] break-words">Topic 3</span>
                    <span class="indicator w-3 h-3 rounded-full transition flex-shrink-0"></span>
                </div>
            </div>
            <hr class="border-neutral-200 my-3">
            <h3 class="text-md text-left font-bold text-neutral-700 pb-2.5">Speaker</h3>
            <div class="flex items-center space-x-3">
                <img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr($resources['company_logo']['alt'] ?? 'Default Alt Text'); ?>" class="w-8 h-8 rounded-full object-cover" />
                <div class="ml-2">
                    <p class="font-sm text-gray-800"><?php echo $resources['author']; ?></p>
                    <p class="text-sm text-gray-600"><?php echo $resources['job_title']; ?></p>
                </div>
            </div>
            <?php if ($attachments): ?>
                <hr class="border-neutral-200 mt-3.5 mb-2.5">
                <h3 class="text-sm font-semibold text-neutral-700 my-3">Attachment</h3>
                <a class="flex justify-between items-center space-x-3 py-4 px-5 border border-dashed border-black text-black rounded-md" href="<?= $attachments['link'] ?>" target="_blank">
                    <span class="w-3/4 text-sm"> <?= $attachments['filename']; ?> </span>
                    <div class="w-6 h-6 fill-current inline-block"> <?php include(get_template_directory() . '/assets/icons/download-arrow.svg'); ?> </div>
                </a>
            <?php endif; ?>
            </hr>
        </div>

        <div class="overlay fixed inset-0 bg-[rgba(0,0,0,0.8)] z-50 flex items-center justify-center mt-24 md:mt-32">
            <div class="grid grid-cols-1 md:grid-cols-2 w-full">
                <div class="flex flex-col items-center justify-center p-8">
                    <div class="w-20 h-20 border border-solid border-white flex items-center justify-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0,0,256,256">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                <g transform="scale(5.12,5.12)">
                                    <path d="M25,3c-6.63672,0 -12,5.36328 -12,12v5h-4c-1.64453,0 -3,1.35547 -3,3v24c0,1.64453 1.35547,3 3,3h32c1.64453,0 3,-1.35547 3,-3v-24c0,-1.64453 -1.35547,-3 -3,-3h-4v-5c0,-6.63672 -5.36328,-12 -12,-12zM25,5c5.56641,0 10,4.43359 10,10v5h-20v-5c0,-5.56641 4.43359,-10 10,-10zM9,22h32c0.55469,0 1,0.44531 1,1v24c0,0.55469 -0.44531,1 -1,1h-32c-0.55469,0 -1,-0.44531 -1,-1v-24c0,-0.55469 0.44531,-1 1,-1zM25,30c-1.69922,0 -3,1.30078 -3,3c0,0.89844 0.39844,1.6875 1,2.1875v2.8125c0,1.10156 0.89844,2 2,2c1.10156,0 2,-0.89844 2,-2v-2.8125c0.60156,-0.5 1,-1.28906 1,-2.1875c0,-1.69922 -1.30078,-3 -3,-3z"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <p class="text-xl text-white text-center mt-4">Please fill your details to receive access</p>
                </div>

                <div class="flex justify-center p-8 md:p-8">
                    <div class="bg-white rounded-lg p-8 md:w-3/4 w-full">
                        <form id="accessForm" class="space-y-4">
                            <div>
                                <label class="block text-gray-700">First Name</label>
                                <input type="text" id="firstName" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-black-500">
                            </div>
                            <div>
                                <label class="block text-gray-700">Last Name</label>
                                <input type="text" id="lastName" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-black-500">
                            </div>
                            <div>
                                <label class="block text-gray-700">Email</label>
                                <input type="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-black-500">
                            </div>
                            <div>
                                <label class="block text-gray-700">Phone Number</label>
                                <input type="text" id="phone" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-black-500">
                            </div>
                            <button type="submit" class="w-full bg-black text-white font-semibold py-2 rounded-lg border border-solid border-black hover:bg-white hover:text-black hover:border-black">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
</section>


<?php if (have_posts()) while (have_posts()) : the_post(); ?>

    <?php get_template_part('partials/newsletter', 'single'); ?>

<?php endwhile;  ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

<script>
    const copyLink = document.querySelector(".copy-text");
    async function copyVideoLink() {
        let linkUrl = window.location.href

        if (navigator.clipboard && navigator.clipboard.writeText) {
            try {
                await navigator.clipboard.writeText(linkUrl);
                copyLink.insertAdjacentHTML('afterend', '<div class=linktooltips-container>Link copied</div>');
                setTimeout(() => {
                    document.querySelectorAll('.linktooltips-container').forEach(el => el.remove());
                }, 3000);
            } catch (err) {
                fallbackCopy(linkUrl);
            }
        } else {
            fallbackCopy(linkUrl);
        }
    }

    function fallbackCopy(text) {
        console.log(copyLink);
        let tempInput = document.createElement("textarea");
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        try {
            document.execCommand("copy");
            copyLink.insertAdjacentHTML('afterend', '<div class=linktooltips-container>Link copied</div>');
            setTimeout(() => {
                document.querySelectorAll('.linktooltips-container').forEach(el => el.remove());
            }, 3000);
        } catch (err) {
            copyLink.insertAdjacentHTML('afterend', '<div class=linktooltips-container>Link copied</div>');
            setTimeout(() => {
                document.querySelectorAll('.linktooltips-container').forEach(el => el.remove());
            }, 3000);
        }
        document.body.removeChild(tempInput);
    }

    function jumpToTime(seconds, element) {
        const iframe = document.querySelector("iframe");
        const videoUrl = new URL(iframe.src);
        const videoId = videoUrl.pathname.split("/embed/")[1].split("?")[0];
        iframe.src = `https://www.youtube.com/embed/${videoId}?start=${seconds}&autoplay=1`;

        document.querySelectorAll(".topic").forEach(topic => {
            topic.classList.remove("font-semibold");
            topic.querySelector(".indicator").style.backgroundColor = "#999999";
        });

        element.classList.add("font-semibold");
        element.querySelector(".indicator").style.backgroundColor = "#22c55e";
    }

    document.addEventListener("DOMContentLoaded", function() {
        const accessForm = document.getElementById("accessForm");
        const overlay = document.querySelector(".overlay");
        const videoContainer = document.querySelector(".video-container");

        function getCookie(name) {
            const cookies = document.cookie.split("; ");
            for (let cookie of cookies) {
                let [key, value] = cookie.split("=");
                if (key === name) return decodeURIComponent(value);
            }
            return null;
        }

        function setCookie(name, value, days = 1) {
            let date = new Date();
            date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
            document.cookie = `${name}=${encodeURIComponent(value)}; expires=${date.toUTCString()}; path=/`;
        }

        function checkAccess() {
            const resourceUserLocal = localStorage.getItem("resourceUser");
            const resourceUserCookie = getCookie("resourceUser");

            if (!resourceUserCookie) {
                localStorage.removeItem("resourceUser");
            }

            if (resourceUserLocal && resourceUserCookie) {
                overlay.style.display = "none";
                document.body.classList.remove("no-scroll");

                if (videoContainer) {
                    videoContainer.style.backgroundColor = "";
                    videoContainer.innerHTML = `<?php if (!empty($resources['is_video_post']) && !empty($resources['video_embed_code'])): ?>
                    <?= $resources['video_embed_code']; ?>
                <?php else: ?>
                    <p class="text-center text-gray-500">No video available</p>
                <?php endif; ?>`;
                }
            } else {
                overlay.style.display = "flex";
                document.body.classList.add("no-scroll");

                if (videoContainer) {
                    videoContainer.style.backgroundColor = "#999999";
                    videoContainer.innerHTML = `
                    <div style="
                        display: flex; 
                        justify-content: center; 
                        align-items: center; 
                        width: 100%; 
                        height: 100%; 
                        color: white; 
                        font-size: 18px; 
                        font-weight: semi-bold; 
                        text-align: center;
                    ">
                        Access Restricted
                    </div>
                `;
                }
            }
        }

        checkAccess();
        accessForm.addEventListener("submit", function(event) {
            event.preventDefault();

            let resourceUser = {
                firstName: document.getElementById("firstName").value,
                lastName: document.getElementById("lastName").value,
                email: document.getElementById("email").value,
                phone: document.getElementById("phone").value
            };

            if (resourceUser.firstName && resourceUser.lastName && resourceUser.email) {
                localStorage.setItem("resourceUser", JSON.stringify(resourceUser));
                setCookie("resourceUser", JSON.stringify(resourceUser));

                overlay.style.display = "none";
                document.body.classList.remove("no-scroll");

                if (videoContainer) {
                    videoContainer.style.backgroundColor = "";
                    videoContainer.innerHTML = `<?php if (!empty($resources['is_video_post']) && !empty($resources['video_embed_code'])): ?>
                    <?= $resources['video_embed_code']; ?>
                <?php else: ?>
                    <p class="text-center text-gray-500">No video available</p>
                <?php endif; ?>`;
                }

                iziToast.show({
                    title: "Success",
                    message: "Form submitted successfully!",
                    position: "topCenter",
                    timeout: 3000,
                    backgroundColor: "#74ed90",
                });
            } else {
                iziToast.error({
                    title: "Error",
                    message: "Please fill in all fields!",
                    position: "topCenter",
                    timeout: 3000,
                });
            }
        });
    });
</script>

<?php get_footer(); ?>