function convert_to_id(link_or_id) {
    var result = null;
    link_or_id = link_or_id.trim();
    var comment_id = link_or_id['match'](/(.*)\/posts\/([0-9]{8,})\?comment_id=([0-9]{8,})/);
    var comment_id_2 = link_or_id['match'](/(.*)\/posts\/pfbid(.*)\?comment_id=([0-9]{8,})/);
    var comment_id_3 = link_or_id['match'](/([0-9]{8,})_([0-9]{8,})/);
    var post_id = link_or_id['match'](/(.*)\/posts\/([0-9]{8,})/);
    var post_id_2 = link_or_id['match'](/(.*)\/posts\/pfbid(.*)\?/);
    var post_id_3 = link_or_id['match'](/(.*)\/posts\/pfbid(.*)/);
    var post_id_5 = link_or_id['match'](/(.*)\/groups\/([0-9]{8,})\?multi_permalinks=([0-9]{8,})/);
    var post_id_6 = link_or_id['match'](/(.*)\/permalink.php\?story_fbid=pfbid(.*)\&/);
    var post_id_7 = link_or_id['match'](/(.*)\/permalink.php\?story_fbid=pfbid(.*)/);
    var post_id_9 = link_or_id['match'](/pfbid/);
    var photo_id = link_or_id['match'](/(.*)\/photo.php\?fbid=([0-9]{8,})/);
    var photo_id_2 = link_or_id['match'](/(.*)\/photo\?fbid=([0-9]{8,})/);
    var photo_id_3 = link_or_id['match'](/(.*)\/photo\/\?fbid=([0-9]{8,})/);
    var video_id = link_or_id['match'](/(.*)\/video.php\?v=([0-9]{8,})/);
    var story_id = link_or_id['match'](/(.*)\/story.php\?story_fbid=([0-9]{8,})/);
    var link_id = link_or_id['match'](/(.*)\/permalink.php\?story_fbid=([0-9]{8,})/);
    var other_id = link_or_id['match'](/(.*)\/([0-9]{8,})/);
    var other_id_2 = link_or_id['match'](/^[0-9.]+$/);

    if (comment_id) {
        return comment_id[2] + '_' + comment_id[3];
    };

    if (comment_id_2) {
        return 'pfbid' + comment_id_2[2] + '_' + comment_id_2[3]
    };

    if (comment_id_3) {
        return comment_id_3[0];
    };

    if (post_id) {
        return result = post_id[2];
    }

    if (post_id_2) {
        return result = 'pfbid' + post_id_2[2];
    }

    if (post_id_3) {
        return result = 'pfbid' + post_id_3[2];
    }


    if (post_id_5) {
        return result = post_id_5[3];
    }

    if (post_id_6) {
        return result = 'pfbid' + post_id_6[2];
    }

    if (post_id_7) {
        return result = 'pfbid' + post_id_7[2];
    }

    if (post_id_9) {
        return link_or_id;
    }

    if (photo_id) {
        return result = photo_id[2];
    }

    if (video_id) {
        return result = video_id[2]
    }

    if (story_id) {
        return result = story_id[2]
    }

    if (link_id) {
        return result = link_id[2]
    }

    if (other_id) {
        return result = other_id[2]
    }

    if (other_id_2) {
        return result = other_id_2[0]
    }

    if (photo_id_2) {
        return result = photo_id_2[2];
    }

    if (photo_id_3) {
        return result = photo_id_3[2];
    }


}
