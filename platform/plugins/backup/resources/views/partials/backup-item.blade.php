<tr class="@if (!empty($odd) && $odd) odd @else even @endif">
    <td>{{ $data['name'] }}</td>
    <td>
        @if ($data['description'])
            {{ $data['description'] }}
        @else
            &mdash;
        @endif
    </td>
    <td>{{ BaseHelper::humanFilesize(get_backup_size($key)) }}</td>
    <td style="width: 250px;">{{ $data['date'] }}</td>
    <td style="width: 150px;">
        @if ($backupManager->isDatabaseBackupAvailable($key))
            <a
                class="text-success me-1"
                data-bs-toggle="tooltip"
                href="{{ route('backups.download.database', $key) }}"
                title="{{ trans('plugins/backup::backup.download_database') }}"
            ><i class="fa fa-database"></i></a>
        @endif

        <a
            class="text-primary me-1"
            data-bs-toggle="tooltip"
            href="{{ route('backups.download.uploads.folder', $key) }}"
            title="{{ trans('plugins/backup::backup.download_uploads_folder') }}"
        ><i class="fa fa-download"></i></a>

        @if (
            $driver === 'mysql' &&
                auth()->guard()->user()->hasPermission('backups.restore'))
            <a
                class="text-info restoreBackup me-2"
                data-section="{{ route('backups.restore', $key) }}"
                data-bs-toggle="tooltip"
                href="#"
                title="{{ trans('plugins/backup::backup.restore_tooltip') }}"
            ><i class="fa fa-rotate-left"></i></a>
        @endif

        @if (auth()->guard()->user()->hasPermission('backups.destroy'))
            <a
                class="text-danger deleteDialog"
                data-section="{{ route('backups.destroy', $key) }}"
                data-bs-toggle="tooltip"
                href="#"
                title="{{ trans('core/base::tables.delete_entry') }}"
            ><i class="fa fa-trash"></i></a>
        @endif
    </td>
</tr>
