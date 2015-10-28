Summary: NethServer vsftpd configuration
Name: nethserver-vsftpd
Version: 1.0.5
Release: 1%{?dist}
License: GPL
URL: %{url_prefix}/%{name} 
Source0: %{name}-%{version}.tar.gz
BuildArch: noarch

Requires: nethserver-base
Requires: vsftpd

BuildRequires: perl
BuildRequires: nethserver-devtools 

%description
NethServer vsftp configuration

%prep
%setup

%build
%{makedocs}
perl createlinks

%install
rm -rf $RPM_BUILD_ROOT
(cd root; find . -depth -print | cpio -dump $RPM_BUILD_ROOT)
%{genfilelist} $RPM_BUILD_ROOT --dir /var/lib/nethserver/ftp/ 'attr(0775,ftp,ftp)' > %{name}-%{version}-filelist
echo "%doc COPYING" >> %{name}-%{version}-filelist

%post

%preun

%files -f %{name}-%{version}-filelist
%defattr(-,root,root)

%changelog
* Wed Oct 28 2015 Giacomo Sanchietti <giacomo.sanchietti@nethesis.it> - 1.0.5-1
- vsftpd logging too verbose by default - Enhancement #3292 [NethServer]
- FTP - some virtual users can't login - Bug #3281 [NethServer]

* Tue Sep 29 2015 Davide Principi <davide.principi@nethesis.it> - 1.0.4-1
- Make Italian language pack optional - Enhancement #3265 [NethServer]

* Thu Sep 24 2015 Davide Principi <davide.principi@nethesis.it> - 1.0.3-1
- Drop lokkit support, always use shorewall - Enhancement #3258 [NethServer]

* Mon Sep 14 2015 Giacomo Sanchietti <giacomo.sanchietti@nethesis.it> - 1.0.2-1
- FTP account overwrite system user - Bug #3234 [NethServer]

* Tue Jul 08 2014 Giacomo Sanchietti <giacomo.sanchietti@nethesis.it> - 1.0.1-1.ns6
- Allow chroot on home directory for system users - Enhancement #2805

* Mon Jul 07 2014 Giacomo Sanchietti <giacomo.sanchietti@nethesis.it> - 1.0.0-1.ns6
- First FTP server release - Feature #1762

