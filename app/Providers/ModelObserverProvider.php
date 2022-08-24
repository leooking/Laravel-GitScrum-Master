<?php

namespace GitScrum\Providers;

use Illuminate\Support\ServiceProvider;
use GitScrum\Models\Attachment;
use GitScrum\Models\Branch;
use GitScrum\Models\Comment;
use GitScrum\Models\Favorite;
use GitScrum\Models\Issue;
use GitScrum\Models\Label;
use GitScrum\Models\Note;
use GitScrum\Models\ProductBacklog;
use GitScrum\Models\Sprint;
use GitScrum\Models\Status;
use GitScrum\Models\UserStory;
use GitScrum\Models\Organization;
use GitScrum\Observers\AttachmentObserver;
use GitScrum\Observers\BranchObserver;
use GitScrum\Observers\CommentObserver;
use GitScrum\Observers\FavoriteObserver;
use GitScrum\Observers\IssueObserver;
use GitScrum\Observers\LabelObserver;
use GitScrum\Observers\NoteObserver;
use GitScrum\Observers\ProductBacklogObserver;
use GitScrum\Observers\SprintObserver;
use GitScrum\Observers\StatusObserver;
use GitScrum\Observers\UserStoryObserver;
use GitScrum\Observers\OrganizationObserver;

class ModelObserverProvider extends ServiceProvider
{
    public function boot()
    {
        Attachment::observe(AttachmentObserver::class);
        Branch::observe(BranchObserver::class);
        Comment::observe(CommentObserver::class);
        Favorite::observe(FavoriteObserver::class);
        Issue::observe(IssueObserver::class);
        Label::observe(LabelObserver::class);
        Note::observe(NoteObserver::class);
        ProductBacklog::observe(ProductBacklogObserver::class);
        Sprint::observe(SprintObserver::class);
        Status::observe(StatusObserver::class);
        UserStory::observe(UserStoryObserver::class);
        Organization::observe(OrganizationObserver::class);
    }

    public function register()
    {
    }
}
