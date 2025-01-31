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
            <div class="video-container">
                <?php if (!empty($resources['is_video_post']) && !empty($resources['video_embed_code'])): ?>
                    <?= $resources['video_embed_code']; ?>
                <?php else: ?>
                    <p class="text-center text-gray-500">No video available</p>
                <?php endif; ?>
            </div>

            <div class="flex justify-between items-center text-md mt-6">
                <div class="flex items-center">
                    <span class="mr-4">Duration</span>
                    <span><b> <?= $resources['video_duration']; ?></b></span>
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


        <div class="col-span-1 md:border-l md:pl-8 border-gray">
            <div class="w-full h-7 md:h-[400px] bg-transparent rounded-lg"></div>
            <hr class="border-neutral-200 my-2.5">
            <h3 class="text-sm text-left font-semibold text-neutral-700 pb-2.5">Speaker</h3>
            <div class="flex items-center space-x-3">
                <img src="<?php echo esc_url($author_avatar); ?>"
                    alt="<?php echo (is_array($resources) && isset($resources['company_logo']['alt'])) ? esc_attr($resources['company_logo']['alt']) : 'Default Alt Text'; ?>"
                    class="w-8 h-8 rounded-full object-cover" />

                <div class="ml-2">
                    <p class="font-sm text-gray-800"><?php echo $resources['author']; ?></p>
                    <p class="text-sm text-gray-600"><?php echo $resources['job_title']; ?></p>
                </div>
            </div>
            <?php if($attachments): ?>
                <hr class="border-neutral-200 mt-3.5 mb-2.5">
                <h3 class="text-sm font-semibold text-neutral-700 my-3">Attachment</h3>
                <a class="flex justify-between items-center space-x-3 py-4 px-5 border border-dashed border-black text-black rounded-md" href="<?= $attachments['link'] ?>" target="_blank">
                    <span class="w-3/4 text-sm"><?= $attachments['filename']; ?></span>
                    <div class="w-6 h-6 fill-current inline-block"><?php include(get_template_directory() . '/assets/icons/download-arrow.svg'); ?></div>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>



<?php if (have_posts()) while (have_posts()) : the_post(); ?>

    <?php get_template_part('partials/newsletter', 'single'); ?>

<?php endwhile;  ?>

<script>
	const copyLink = document.querySelector(".copy-text");
    async function copyVideoLink() {
        let linkUrl = window.location.href

        if (navigator.clipboard && navigator.clipboard.writeText) {
            try {
                await navigator.clipboard.writeText(linkUrl);
                copyLink.insertAdjacentHTML('afterend', '<div class=linktooltips-container>Link copied</div>');
                setTimeout(() => { document.querySelectorAll('.linktooltips-container').forEach(el => el.remove()); }, 3000);
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
            setTimeout(() => { document.querySelectorAll('.linktooltips-container').forEach(el => el.remove()); }, 3000);
        } catch (err) {
            copyLink.insertAdjacentHTML('afterend', '<div class=linktooltips-container>Link copied</div>');
            setTimeout(() => { document.querySelectorAll('.linktooltips-container').forEach(el => el.remove()); }, 3000);
            // alert("Failed to copy link.");
        }
        document.body.removeChild(tempInput);
    }
</script>

<?php get_footer(); ?>