<?php

namespace GitScrum\Models;

use GitScrum\Presenters\CommitFilePresenter;
use Illuminate\Database\Eloquent\Model;
use GitScrum\Scopes\CommitFileScope;
use GitScrum\Scopes\GlobalScope;
use GitScrum\Presenters\GlobalPresenter;

class CommitFile extends Model
{
    use CommitFileScope;
    use GlobalScope;
    use CommitFilePresenter;
    use GlobalPresenter;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'commit_files';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['commit_id', 'sha', 'filename', 'status', 'additions', 'deletions', 'changes',
        'raw_url', 'raw', 'phpcs', 'patch', 'phploc_size', 'phploc_lines_of_code', 'phploc_lines_of_code_percent',
        'phploc_comment_lines_of_code', 'phploc_comment_lines_of_code_percent', 'phploc_non-comment_lines_of_code',
        'phploc_non-comment_lines_of_code_percent', 'phploc_logical_lines_of_code', 'phploc_logical_lines_of_code_percent',
        'phploc_namespaces', 'phploc_interfaces', 'phploc_traits', 'phploc_classes', 'phploc_scope_non-static',
        'phploc_scope_static', 'phploc_visibility_public', 'phploc_visibility_public_percent', 'phploc_visibility_non-public',
        'phploc_visibility_non-public_percent', 'phploc_named_functions', 'phploc_named_functions_percent', 'phploc_anonymous_functions',
        'phploc_constants_global', 'phploc_constants_global_percent', 'phploc_constants_class', 'phploc_constants_class_percent', 'deleted_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function commit()
    {
        return $this->belongsTo(Commit::class, 'commit_id', 'id');
    }

    public function filePhpcs()
    {
        return $this->hasMany(CommitFilePhpc::class, 'commit_file_id', 'id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
